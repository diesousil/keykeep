<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Model\Credential;

class Credential extends BaseModel 
{
    protected $table = 'Credentials';

    protected $fillable = [
        'title', 'description', 'group_id', 'user_id', 'url', 'login', 'password','observations'
    ];

    protected $defaultOrder = ['title','asc'];

    public function __construct() {
        parent::__construct();
    }

    public function saveByForm($formData) {
        
        $formData["user_id"] = Auth::id('id');
        $result = parent::saveByForm($formData);
        
        return $result;

    }

}
