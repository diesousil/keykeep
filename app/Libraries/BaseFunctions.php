<?php
    namespace App\Libraries;

    class BaseFunctions  {

        public function getCurrentAction() {

            $currentAction = \Route::currentRouteAction();
            list($controller, $action) = explode('@', $currentAction);
            
            $controllerArr = explode('\\',$controller);
            $controllerName = ucwords(str_replace('Controller','',$controllerArr[count($controllerArr)-1]));
            $actionName = ucwords($action);

            $resultArray = ['controller' => $controllerName , 'action' => $actionName];
            
            return $resultArray;

    
        }

    }