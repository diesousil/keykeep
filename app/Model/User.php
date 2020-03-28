<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
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

    public function validate_credentials($email, $password, &$name) {
        
        $userData = User::where("email",$email)->first();
        
        if($userData == NULL) {
            $result = User::AUTH_STATUS_USER_NOT_FOUND;
        } else {
            $hashedPassword = hash('sha512', $password);

            if(strcmp($hashedPassword, $userData->password) === 0) {
                $result = User::AUTH_STATUS_SUCCESS;
                $name = $userData["name"];
            } else {
                $result = User::AUTH_STATUS_INCORRECT_PASSWORD;                                
            }
        }

        return $result;
    }

    public function authenticate(Request $request) {
        $name = "";
        
        $data = $request->post();

        $email = $data["email"];
        $password = $data["password"];

        $result = $this->validate_credentials($email, $password, $name);

        if($result == User::AUTH_STATUS_SUCCESS) {
            $sessionData = ["auth"=>["email"=>$email, "name"=>$name, "date"=>date("d/m/Y H:i:s")]];
            $request->session()->put($sessionData);
        }

        return $result;
    }

    public function is_authenticated() {
        return Session::has('auth');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = hash('sha512', $password);
    }

}
