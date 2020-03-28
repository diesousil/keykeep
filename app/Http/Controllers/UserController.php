<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BaseController;
use App\Model\User;

class UserController extends BaseController
{
	protected $userModel;

	public function __construct(User $userModel ) {
		$this->userModel = $userModel;
	}

    public function login(Request $request) {

		if ($request->isMethod('post'))
		{
			$result = $this->userModel->authenticate($request);

			if($result == User::AUTH_STATUS_SUCCESS) {
				return redirect()->action('HomeController@index');
			} else {
				Session::flash('error-message', 'Invalid credentials.'); 
			}
		}

		return view('users.login');
	}
	
    public function forgot() {
		return view('users.forgot');
	}
	
	public function recover() {
		return view('users.recover');
	}
	
	public function register() {
		return view('users.register');
	}
	
	public function logout() {
		return redirect('login');
	}
}
