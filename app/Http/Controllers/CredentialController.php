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
		$credentialObjList = $this->CredentialModel->list();
		
		return $this->viewResult('credentials.list',  ['select'=>$select]);
	}

	public function create() {
		$Credentials = $this->CredentialModel->list();
		$Credentialsgroup = $this->groupModel->list();
		
		return $this->viewResult('credentials.create', ['select'=>$Credentials, 'select2'=>$Credentialsgroup]);
	}

	public function save(Request $request) {

		$formData = $request->all();
		if(isset($formData['id'])) {
			$resultado = $this->CredentialModel->atualiza($formData);
		}
		else{
			$resultado = $this->CredentialModel->create($formData);
		}
		return redirect('credentials');
	}

	public function delete(Request $request) {
		$id = $request->query('id');
		
		$resultado = $this->CredentialModel->remove($id);

		return redirect('Credentials');
	}
	public function edit(Request $request) {
		$Credentials = $this->CredentialModel->list();
		 
		$id = $request->query('id');
		
		$resultado = $this->CredentialModel->edit($id);
		$Credentialsgroup = $this->groupModel->list();

		return $this->viewResult('credentials.edit', ['resultedit'=>$resultado, 'select2'=>$Credentialsgroup]);
	}
}
