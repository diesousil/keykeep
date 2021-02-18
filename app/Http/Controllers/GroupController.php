<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Model\Group;

class GroupController extends BaseController
{

	protected $groupModel;

	public function __construct(Group $groupModel) {
		parent::__construct();
		$this->groupModel = $groupModel;		
	}

    public function index() {
		$groupsList = $this->groupModel->getList();
		
		return $this->viewResult('group.list', ['groups'=>$groupsList,'actionIsList'=>true]);
	}

	public function create() {
		$parentGroups = $this->groupModel->getList();

		return $this->viewResult('group.create', ['parentGroups'=>$parentGroups]);
	}

	public function save(Request $request) {

		$formData = $request->all();
		$result = $this->groupModel->saveByForm($formData);
		
		return redirect('groups');
	}

	public function delete(Request $request) {
		
		$id = $request->query('id');		
		$resultado = $this->groupModel->deleteById($id);

		return redirect('groups');
	}

	public function edit(Request $request) {
		
		$id = $request->query('id');
		$groupToEdit = $this->groupModel->getById($id);
		$groups = $this->groupModel->getList();
		
		return $this->viewResult('group.edit', ['groupToEdit'=>$groupToEdit, 'allGroups'=>$groups]);
	}
}
