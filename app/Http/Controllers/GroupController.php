<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Model\Group;

class GroupController extends BaseController
{

	protected $groupModel;

	public function __construct(Group $groupModel) {
		$this->groupModel = $groupModel;		
	}

    public function index() {
		$groups = $this->groupModel->list();
		
		return view('group.list',  ['groups'=>$groups] ); // vai procurar uma view chamada index, no diretório Group
	}

	public function create() {
		$groups = $this->groupModel->list();
		return view('group.create', ['select'=>$groups]); // vai procurar uma view chamada index, no diretório Group
	}

	public function save(Request $request) {

		$formData = $request->all();
		
		if(isset($formData['id'])) {
			$resultado = $this->groupModel->atualiza($formData);
		}
		else{
			$resultado = $this->groupModel->create($formData);
		}
		return redirect('groups');
	}

	public function delete(Request $request) {
		$id = $request->query('id');
		
		$resultado = $this->groupModel->remove($id);

		return redirect('groups');
	}
	public function edit(Request $request) {
		$groups = $this->groupModel->list();
		$id = $request->query('id');
		
		$resultado = $this->groupModel->edit($id);
		
		return view('group.edit', ['resultedit'=>$resultado, 'select'=>$groups]);
	}
}
