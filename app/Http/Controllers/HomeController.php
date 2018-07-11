<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function editProfile($id) {

		$user = DB::table('users')->select('id', 'firstName', 'email', 'lastName', 'address', 'cif', 'rucm')
			->where('id', '=', $id)->get()->first();

		return view('editUser')->with("user", $user);

	}

	public function editUser(Request $request, $id) {

		$rules = [
			'firstName' => 'required|string|max:255',
			'lastName' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users,email,' . $id,
			'address' => 'required|string|max:255',
			'cif' => 'required|integer',
			'rucm' => 'required|integer',
		];

		$this->validate($request, $rules);
		$user = User::find($id);
		$user->firstName = $request->firstName;
		$user->lastName = $request->lastName;
		$user->email = $request->email;
		$user->address = $request->address;
		$user->cif = $request->cif;
		$user->rucm = $request->rucm;

		$user->update();

		return redirect('home');
	}
}
