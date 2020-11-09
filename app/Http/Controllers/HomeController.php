<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Model\Group;

class HomeController extends BaseController
{
	public $groupModel;
	
	public function __construct(Group $groupModel) {
		parent::__construct();
		$this->groupModel = $groupModel;		
	}

	public function index() {
		$groupsTree = $this->groupModel->getGroupsTree(Auth::id('id'));
		var_dump($groupsTree);
		return $this->viewResult('index', ['groupsTree'=>$groupsTree] );
	}

	public function list() {
		return $this->viewResult('list');
	}

	public function about() {
		return $this->viewResult('about');
	}
	
}
