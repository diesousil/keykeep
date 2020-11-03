<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Model\Credential;

class BaseModel extends Eloquent 
{
    protected $class;
    protected $defaultOrder;

    public function __construct() {
        parent::__construct();
        $this->class = get_class($this);
    }

    public function getById($id) {
        
        $id = intval($id);
        $objToReturn = $this->class::find($id);

        return $objToReturn;
    }
    
    public function getList() {
        
        if(isset($this->defaultOrder) && count($this->defaultOrder) >= 2) {
            $listToReturn = $this->class::orderBy($this->defaultOrder[0], $this->defaultOrder[1])->get();
        } else {
            $listToReturn = $this->class::all();
        }

        return $listToReturn;
        
    }
    
    public function deleteById($id) {
        
        $objToDelete = $this->getById($id);
        $result = $objToDelete->delete();

        return $result;
    }

    public function saveByForm($formData) {
        
        $formFields = $this->fillable;

        if(isset($formData["id"]) && !empty($formData["id"])) {
            $objToSave = $this->class::find(intval($formData["id"]));            
        } else {
            $objToSave = new $this->class();
        }

        foreach($formFields as $field) {

            if(isset($formData[$field])) {
                $objToSave->$field = $formData[$field];
            } else {
                $objToSave->$field = null;
            }

        }

        $result = $objToSave->save();
        
        return $result;
        
        
    }

}
