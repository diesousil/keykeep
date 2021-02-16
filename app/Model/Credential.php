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
    protected $table = 'credentials';

    protected $fillable = [
        'title', 'description', 'group_id', 'user_id', 'url', 'login', 'password','observations'
    ];

    protected $defaultOrder = ['title','asc'];

    public function __construct() {
        parent::__construct();
    }

    public function getByGroupId($groupId, $userId = null, $order = null) {
        
        if($order == null)
            $order = $this->defaultOrder;

        $queryBuilder = Credential::where('group_id', $groupId)->orderBy($order[0], $order[1]);
        
        if($userId != null) {
            $queryBuilder->where('user_id', $userId);
        }
        
        $credentials = $queryBuilder->get();

        return $credentials;
    }

    public function saveByForm($formData) {
        
        $formData["user_id"] = Auth::id('id');
        $result = parent::saveByForm($formData);
        
        return $result;

    }

}
