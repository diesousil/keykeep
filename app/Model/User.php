<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class User extends Authenticatable
{
    public const AUTH_STATUS_USER_NOT_FOUND = 'USER_NOT_FOUND';
    public const AUTH_STATUS_INCORRECT_PASSWORD = 'INCORRECT_PASSWORD';
    public const AUTH_STATUS_SUCCESS = 'AUTHENTICATION_SUCCESS';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function validate_credentials($email, $password) {
        
        $userData = User::where("email",$email)->first();
        
        if($userData == NULL) {
            $result = User::AUTH_STATUS_USER_NOT_FOUND;
        } else {
            $hashedPassword = hash('sha512', $password);

            if(strcmp($hashedPassword, $userData->password) === 0) {
                $result = User::AUTH_STATUS_SUCCESS;
            } else {
                $result = User::AUTH_STATUS_INCORRECT_PASSWORD;                                
            }
        }

        return $result;
    }

    public function authenticate(Request $request) {

        $credentials = $request->only('email', 'password');
        $result = Auth::guard('web')->attempt($credentials);

        if($result === false)
            $result = $this->validate_credentials($credentials["email"],$credentials["password"]);
        else
            $result = User::AUTH_STATUS_SUCCESS;
        
        return $result;
    }

    public function logout() {
        return Auth::logout();
    }
    public function list() {
        
        $UserResult = User::all();
        
        return $UserResult;
    }
    public function create($formData) {

        // ORM => Object Relation Mapping
        // classe = tabela
        // objeto = linha da tabela

        $newUsers = new User();

        $newUsers->name = $formData["name"];
        $newUsers->email = $formData["email"];
        $newUsers->password = hash('sha512', $formData["password"]);
        $result = $newUsers->save();
        
        return $result;
    }
    public function atualiza($formData) {

        $id = $formData['id'];

        $updateUsers = User::where("id",$id)->first();;

        $updateUsers->name = $formData["name"];
        $updateUsers->description = $formData["description"];
        $updateUsers->password = hash('sha512', $formData["password"]);
        $result = $newGroup->save();
        
        return $result;
    }

    public function remove($id) {
        $result=User::find($id)->delete();
        
        return $result;
    }
    public function edit($id) {

        $result=User::where("id",$id)->first();
        
        return $result;
    }
}
