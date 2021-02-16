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
		parent::__construct();
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
		return $this->viewResult('users.login');
	}
	
    public function forgot() {
		$this->CheckIsAuthenticated();
		
		return $this->viewResult('users.forgot');
	}
	
	public function recover() {
		$this->CheckIsAuthenticated();

		return $this->viewResult('users.recover');
	}
	
	public function register() {
		$this->CheckIsAuthenticated();

		return $this->viewResult('users.register');
	}
	
	public function logout() {
		$this->userModel->logout();

		return $this->viewResult('users.login');
	}
}
