<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller {
	public function __construct() {

		$this->middleware('guest:admin', ['except' => ['logoutAdmin']]);
	}
	public function showLoginForm() {
		return view('auth.admin-login');
	}

	public function login(Request $request) {
		// Validate the form data
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6',
		]);

		// Attempt to log the user in
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
			//if successful, then redirect to their intended location
			return redirect()->intended(route('admin.dashboard'));
		}
		//in unsuccessful, then redirect back to the login with the form data
		return redirect()->back()->withInput($request->only('email', 'remember'));

	}
	public function logoutAdmin() {
		Auth::guard('admin')->logout();
		return redirect('/');
	}

}
