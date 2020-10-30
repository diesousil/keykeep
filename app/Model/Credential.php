<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Model\Credential;

class Credential extends Eloquent 
{
    protected $table = 'Credentials';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'group_id', 'user_id', 'Url', 'Login', 'Password','observations'
    ];

    public function list() {
        
        $select = Credential::all();
        
        return $select;
    }

    public function create($formData) {

        // ORM => Object Relation Mapping
        // classe = tabela
        // objeto = linha da tabela

        $newCredential = new Credential();
        
        $newCredential->title = $formData["title"];
        $newCredential->description = $formData["description"];
        $newCredential->user_id = $id = Auth::id('id');
        


        if($formData["group_id"] != 0){
            $newCredential->group_id = $formData["group_id"];
        }
        else{
            $newCredential->group_id = null;
        }
        $newCredential->Url = $formData["Url"];
        $newCredential->Login = $formData["Login"];
        $newCredential->Password = $formData["Password"];
        $newCredential->observations = $formData["observations"];   
        $result = $newCredential->save();
        
        return $result;
    }
    public function update($formData) {

        var_dump($formData);
        exit;

        $newCredential = new Credential();
        
        $id = $formData['id'];

        $newCredential->title = $formData["title"];
        $newCredential->description = $formData["description"];
        $newCredential->user_id = $id = Auth::id('id');
        $newCredential->group_id = $formData["group_id"];
        $newCredential->Url = $formData["url"];
        $newCredential->Login = $formData["login"];
        $newCredential->Password = $formData["password"];
        $newCredential->observations = $formData["observations"];

        $result = $newCredential->save();
        
        return $result;
    }
    public function remove($id) {
        $result=Credential::where("group_id",$id)->delete();
        $result=Credential::find($id)->delete();
        
        return $result;
    }
    public function edit($id) {

        $result=Credential::where("id",$id)->first();
        
        return $result;
    }

}
