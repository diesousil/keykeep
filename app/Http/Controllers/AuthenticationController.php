<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Model\User;

class AuthenticationController extends BaseController
{
	protected $userModel;

	public function __construct(User $userModel ) {
		$this->userModel = $userModel;		
	}

	private function CheckIsAuthenticated() {
		if(Auth::check()) {
			return redirect()->action("HomeController@index");
		}
	}

    public function login(Request $request) {

		$this->CheckIsAuthenticated();

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
		$this->CheckIsAuthenticated();
		return view('users.forgot');
	}
	
	public function recover() {
		$this->CheckIsAuthenticated();
		return view('users.recover');
	}
	
	public function register() {
		$this->CheckIsAuthenticated();
		return view('users.register');
	}
	
	public function logout() {
		$this->userModel->logout();
		return redirect('login');
	}
}
