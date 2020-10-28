<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends BaseController
{
    protected $UserModel;

	public function __construct(User $UserModel) {
		parent::__construct();
		$this->UserModel = $UserModel;		
	}

    public function index() {
		$UserResult = $this->UserModel->list(); 
		
		
		return view('users.list', ['UserResult'=>$UserResult] );
	}
	public function create() {
		$UserResult = $this->UserModel->list();

		return $this->viewResult('users.create', ['UserResult'=>$UserResult]);
	}
	public function save(Request $request) {

		$formData = $request->all();
		
		if(isset($formData['id'])) {
			$resultado = $this->UserModel->atualiza($formData);
		}
		else{
			$resultado = $this->UserModel->create($formData);
		}
		return redirect('users');
	}

	public function delete(Request $request) {
		$id = $request->query('id');
		
		$resultado = $this->UserModel->remove($id);

		return redirect('users');
	}

	public function edit(Request $request) {
		$id = $request->query('id');
		
		$resultUser = $this->UserModel->edit($id);
		
		return $this->viewResult('users.edit', ['resultedit'=>$resultUser]);
	}
}