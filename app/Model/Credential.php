<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Credential extends Eloquent 
{
    protected $table = 'credentials';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'group_id', 'user_id'
    ];

    public function list() {
        
        $Credentials = Credential::all();
        
        return $Credentials;
    }

}
