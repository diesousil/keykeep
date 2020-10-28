<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Libraries\BaseFunctions;

class BaseController extends Controller
{
    protected $title;
    protected $userName;
    protected $baseFunctions;
    
    public function __construct() {
        $baseFunctions = new BaseFunctions();
        $currentAction = $baseFunctions->getCurrentAction();

        $this->title = $currentAction['controller'] . ' - ' . $currentAction['action'];
        
    }

    public function viewResult($viewName = '', $data = []) {
        
        if(!isset($data['title']))
            $data['title'] = $this->title;

        if(auth()->user() && !isset($data['userName']))
            $data['userName'] = auth()->user()->name;

        return view($viewName, $data);

    }
    
    public function authorize()
    {
        return true;
    }

}
