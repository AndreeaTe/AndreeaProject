<?php

namespace App\Http\Controllers;
use App\Company;
use App\Medical;
use App\Patient;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use View;

class MedicalController extends Controller {
	protected $posts_per_page = 5;
	public function index(Request $request) {
		$user = Auth::user();
		if ($user) {
			$records = Medical::with('patient', 'company')->where('idUser', '=', $user->id)->get();
			foreach ($records as $record) {
				switch ($record->type) {
				case '1':
					$record->type = "Angajare";
					break;
				case '2':
					$record->type = "Control medical periodic";
					break;
				case '3':
					$record->type = "Adaptare";
					break;
				case '4':
					$record->type = "Reluarea muncii";
					break;
				case '5':
					$record->type = "Supraveghere specială";
					break;
				case '6':
					$record->type = "Altele";
					break;
				}
				switch ($record->medicalOpinion) {
				case '1':
					$record->medicalOpinion = "APT";
					break;
				case '2':
					$record->medicalOpinion = "APT CONDITIONAT";
					break;
				case '3':
					$record->medicalOpinion = "INAPT TEMPORAR";
					break;
				case '4':
					$record->medicalOpinion = "APT CONDITIONAT";
					break;
				}
			}

			return View::make('index')->with('records', $records);
		} else {
			return redirect('login');
		}
	}

	public function create() {
		$user = Auth::user();
		$userDetails = DB::table('users')->select('firstName', 'lastName', 'address', 'cif', 'rucm')
			->where('id', '=', $user->id)->get()->first();
		$carbon = Carbon::now();
		return view('request')->with("userDetails", $userDetails)
			->with("carbon", $carbon);
	}

	public function store(Request $request) {
		if (Auth::user()) {
			$rules = [
				'address' => 'required|min:3|max:255',
				'phoneNumber' => 'required|max:50',
				'fax' => 'sometimes|nullable',
				'recommendations' => 'sometimes|nullable',
				'CNP' => 'required|digits:13',
				'firstName' => 'required|max:255',
				'lastName' => 'required|max:255',
				'occupation' => 'required|min:3|max:255',
				'job' => 'required|min:2|max:255',
			];

			$record = new Medical();
			$this->validate($request, $rules);
			$companyName = $request->nameCompany;
			$companyExist = Company::where('nameCompany', 'like', $companyName)->get()->first();
			if (empty($companyExist)) {
				$this->validate($request, [
					'companyName' => 'unique:medicalfile,companyName',
				]);
				$company = new Company();
				$company->fax = $request->fax;
				$company->nameCompany = $request->nameCompany;
				$company->address = $request->address;
				$company->phoneNumber = $request->phoneNumber;
				$company->save();
				$record->idCompany = $company->id;
			} else {
				$record->idCompany = $companyExist->id;
			}
			$CNP = $request->CNP;
			$patientExist = Patient::where('CNP', '=', $CNP)->first();
			if (empty($patientExist)) {
				$this->validate($request, [
					'CNP' => 'unique:Patient,CNP',
				]);
				$patient = new Patient();
				$patient->firstName = $request->firstName;
				$patient->lastName = $request->lastName;
				$patient->occupation = $request->occupation;
				$patient->CNP = $request->CNP;
				$patient->job = $request->job;
				$patient->idUser = (Auth::id()) ? Auth::id() : '0';
				$patient->save();
				$record->idPatient = $patient->id;
			} else {
				$record->idPatient = $patientExist->id;
			}
			$record->file = $request->file;
			$record->recommendations = $request->recommendations;
			$record->type = $request->type;
			$record->medicalOpinion = $request->medicalOpinion;
			$record->idUser = (Auth::id()) ? Auth::id() : '0';
			$record->save();

			return redirect('home');
		} else {
			return redirect('login');
		}
	}

	public function edit($id) {
		$user = Auth::user();
		$userDetails = DB::table('users')->select('firstName', 'lastName', 'address', 'cif', 'rucm')
			->where('id', '=', $user->id)->get()->first();
		$record = Medical::where('id', '=', $id)->first();
		$patient = Patient::where('id', '=', $record->idPatient)->first();
		$company = Company::where('id', '=', $record->idCompany)->first();
		$carbon = Carbon::now();
		return view('edit')->with("record", $record)
			->with("patient", $patient)
			->with("company", $company)
			->with("carbon", $carbon)
			->with("userDetails", $userDetails);

	}

	public function update(Request $request, $id) {

		if (Auth::user()) {
			$record = Medical::find($id);
			$patient = Patient::find($record->idPatient);
			$company = Company::find($record->idCompany);
			$companyExist = Company::where('nameCompany', 'like', $request->nameCompany)->get()->first();
			if (empty($companyExist)) {
				$this->validate($request, [
					'companyName' => 'unique:medicalfile,companyName',
				]);
				$company = new Company();
				$company->fax = $request->fax;
				$company->nameCompany = $request->nameCompany;
				$company->address = $request->address;
				$company->phoneNumber = $request->phoneNumber;
				$company->save();
				$record->idCompany = $company->id;
			} else {
				$record->idCompany = $companyExist->id;
			}
			$rules = [
				'address' => 'required|min:3|max:255',
				'phoneNumber' => 'required|max:50',
				'fax' => 'sometimes|nullable',
				'recommendations' => 'sometimes|nullable',
				'CNP' => 'required|digits:13|unique:patient,CNP,' . $patient->id,
				'firstName' => 'required|max:255',
				'lastName' => 'required|max:255',
				'occupation' => 'required|min:3|max:255',
				'job' => 'required|min:2|max:255',
			];

			$this->validate($request, $rules);

			$patient->firstName = $request->firstName;
			$patient->lastName = $request->lastName;
			$patient->occupation = $request->occupation;
			$patient->CNP = $request->CNP;
			$patient->job = $request->job;
			$patient->idUser = (Auth::id()) ? Auth::id() : '0';
			$record->file = $request->file;
			$record->recommendations = $request->recommendations;
			$record->type = $request->type;
			$record->medicalOpinion = $request->medicalOpinion;
			$record->idUser = (Auth::id()) ? Auth::id() : '0';
			$record->idCompany = ($request->idCompany) ? $request->idCompany : $company->id;
			$record->idPatient = $patient->id;

			$patient->update();
			$record->update();
			return redirect('home');
		}
	}

	public function destroy($id) {

		if (Auth::user()) {
			$record = Medical::find($id);
			$patient = Patient::find($record->idPatient);
			$record->delete();
			$patient->delete();
			return redirect('home')->with('success', 'Information has been  deleted');
		}
	}

	public function viewRecord($id) {
		$user = Auth::user();
		$userDetails = DB::table('users')->select('firstName', 'lastName', 'address', 'cif', 'rucm')
			->where('id', '=', $user->id)->get()->first();
		$record = Medical::where('id', '=', $id)->first();
		$patient = Patient::where('id', '=', $record->idPatient)->first();
		$company = Company::where('id', '=', $record->idCompany)->first();
		$carbon = Carbon::now();
		return view('viewRecord')->with("record", $record)
			->with("patient", $patient)
			->with("company", $company)
			->with("carbon", $carbon)
			->with("userDetails", $userDetails);

	}

	public function pdfview(Request $request) {

		// view()->share('users', $users);
		$loggedUser = Auth::user();
		$user = DB::table('users')->select('firstName', 'lastName', 'address', 'cif', 'rucm')
			->where('id', '=', $loggedUser->id)->get()->first();
		$record = Medical::where('id', '=', $request->id)->first();

		$patient = Patient::where('id', '=', $record->idPatient)->first();
		$company = Company::where('id', '=', $record->idCompany)->first();
		$carbon = Carbon::now();
		if ($request->has('download')) {
			// Set extra option
			PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
			// pass view file
			$data = ['userDetails' => $user, 'record' => $record, 'company' => $company, 'patient' => $patient, 'carbon' => $carbon];
			$pdf = PDF::loadView('test', compact('data', $data));
			return $pdf->download('test.pdf');
		}
		return view('test');

	}

	public function autoComplete(Request $request) {
		$query = $request->get('nameCompany', '');
		$products = Company::where('nameCompany', 'LIKE', '%' . $query . '%')->get();
		$data = [];
		foreach ($products as $product) {
			$data[] = array('label' => $product->nameCompany, 'value' => ['address' => $product->address, 'fax' => $product->fax, 'phoneNumber' => $product->phoneNumber, 'id' => $product->id]);
		}
		if (count($data)) {
			return response()->json($data);
		} else {
			return ['value' => 'No Result Found'];
		}
	}
}
