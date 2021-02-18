<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Model\Credential;
use App\Model\Group;

class CredentialController extends BaseController
{

	protected $CredentialModel;
	protected $groupModel;

	public function __construct(Credential $CredentialModel, Group $groupModel) {
		parent::__construct();
		$this->CredentialModel = $CredentialModel;
		$this->groupModel = $groupModel;
	}

    public function index() {
		$credentialsList = $this->CredentialModel->getList();
		
		return $this->viewResult('credentials.list',  ['credentialsList'=>$credentialsList,'actionIsList'=>true]);
	}

	public function create() {
		$groups = $this->groupModel->getList();
		
		return $this->viewResult('credentials.create', ['groups'=>$groups]);
	}

	public function save(Request $request) {

		$formData = $request->all();
		$result = $this->CredentialModel->saveByForm($formData);
		
		return redirect('credentials');
	}

	public function delete(Request $request) {

		$id = $request->query('id');		
		$resultado = $this->CredentialModel->deleteById($id);

		return redirect('Credentials');
	}

	public function edit(Request $request) {
		 
		$id = $request->query('id');
		
		$credentialToEdit = $this->CredentialModel->getById($id);
		$groups = $this->groupModel->getList();

		return $this->viewResult('credentials.edit', ['credentialToEdit'=>$credentialToEdit, 'groups'=>$groups]);
	}
}
