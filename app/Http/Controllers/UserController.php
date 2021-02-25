<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;

class UserController extends BaseController
{
    protected $UserModel;
    protected $RoleModel;

	public function __construct(User $UserModel, Role $RoleModel) {
		parent::__construct();
		$this->UserModel = $UserModel;	
		$this->RoleModel = $RoleModel;		
	}

    public function index() {
		$usersList = $this->UserModel->list();		
		
		return view('users.list', ['usersList'=>$usersList,'actionIsList'=>true] );
	}
	
	public function create() {
		$rolesList = $this->RoleModel->getList();

		return $this->viewResult('users.create', ['rolesList'=>$rolesList]);
	}
	public function save(Request $request) {

		$formData = $request->all();
		$resultado = $this->UserModel->saveByForm($formData);
		
		return redirect('users');
	}

	public function delete(Request $request) {
		$id = $request->query('id');
		
		$resultado = $this->UserModel->remove($id);

		return redirect('users');
	}

	public function edit(Request $request) {
		$id = $request->query('id');		
		$userToEdit = $this->UserModel->getById($id);
		$rolesList = $this->RoleModel->getList();
		
		return $this->viewResult('users.edit', ['userToEdit'=>$userToEdit,'rolesList'=>$rolesList]);
	}
}