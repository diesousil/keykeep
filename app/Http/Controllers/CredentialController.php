<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Model\Credential;

class CredentialController extends BaseController
{

	protected $CredentialModel;

	public function __construct(Credential $CredentialModel) {
		$this->CredentialModel = $CredentialModel;		
	}

    public function index() {
		$Credentials = $this->CredentialModel->list();
		
		return view('Credentials.list',  ['Credentials'=>$Credentials] ); // vai procurar uma view chamada index, no diretório Group
	}

}
