<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Model\Group;
use App\Model\Credential;

class Group extends BaseModel 
{
    protected $table = 'groups';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'parent_id', 'user_id'
    ];

    protected $defaultOrder = ['name','asc'];

    public function getGroupsByParent($parentGroupId = null, $userId = null,  $order = null) {

        if($order == null)
            $order = $this->defaultOrder;        
        
        $queryBuilder = Group::where('parent_id',$parentGroupId)->orderBy($order[0], $order[1]);
        
        if($userId != null)
            $queryBuilder->where('user_id', $userId);
        
        $groups = $queryBuilder->get();
        
        return $groups;
    }

    public function getRootGroups($userId = null, $order = null) {
        return $this->getGroupsByParent(null, $userId, $order);
    }

    public function getNodeChildren($parentGroupId = null, $userId = null, $order = null) {
        $children = $this->getGroupsByParent($parentGroupId, $userId, $order)->toArray();

        if(count($children) > 0) {
            foreach($children as $key => $group) {
                $children[$key]['children'] = $this->getNodeChildren($group['id'], $userId, $order);
                $children[$key]['credentials'] = $this->getCredentialsByGroup($group['id'], $userId);
            }
        }

        return $children;
    }

    public function getGroupsTree($userId = null, $order = null) {

        $roots = $this->getRootGroups($userId, $order)->toArray();

        foreach($roots as $key => $group) {
            $roots[$key]['children'] = $this->getNodeChildren($group['id'], $userId, $order);
            $roots[$key]['credentials'] = $this->getCredentialsByGroup($group['id'], $userId);
        }

        return $roots;

    }

    public function getCredentialsByGroup($groupId = null, $userId = null, $order = null) {
        
        $credentialModel = new Credential();
        $credentials = $credentialModel->getByGroupId($groupId, $userId, $order)->toArray();

        return $credentials;
    }



    public function saveByForm($formData) {
        $formData["user_id"] = Auth::id('id');
        
        if(intval($formData["parent_id"]) == 0)
            $formData["parent_id"] = null;

        return parent::saveByForm($formData);
    }

}
