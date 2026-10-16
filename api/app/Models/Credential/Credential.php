<?php

namespace App\Models\Credential;

use App\Models\Model;
use App\Models\Access\User;
use App\Models\Credential\Tag;

class Credential extends Model
{
    protected $table = "credentials";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url',
        'username',
        'password',
        'ckey',
        'observations',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'password',
        'ckey',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'credential_tags', 'credential_id', 'tag_id')->wherePivotNull("deleted_at");
    }
}
