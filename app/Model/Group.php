<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Model\Credential;

class Group extends Eloquent 
{
    protected $table = 'groups';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'parent_id', 'user_id'
    ];

    public function list() {
        
        $groups = Group::all();
        
        return $groups;
    }

    public function create($formData) {

        // ORM => Object Relation Mapping
        // classe = tabela
        // objeto = linha da tabela

        $newGroup = new Group();

        $newGroup->name = $formData["name"];
        $newGroup->description = $formData["description"];
        $newGroup->user_id = $id = Auth::id('id');;
        $newGroup->parent_id = $formData["parent_id"];
        
        $result = $newGroup->save();
        
        return $result;
    }
    public function atualiza($formData) {

        $id = $formData['id'];

        $newGroup = Group::where("id",$id)->first();;

        $newGroup->name = $formData["name"];
        $newGroup->description = $formData["description"];
        $newGroup->parent_id = $formData["parent_id"];
        
        $result = $newGroup->save();
        
        return $result;
    }
    public function remove($id) {
        $result=Credential::where("group_id",$id)->delete();
        $result=Group::find($id)->delete();
        
        return $result;
    }
    public function edit($id) {

        $result=Group::where("id",$id)->first();
        
        return $result;
    }

}
