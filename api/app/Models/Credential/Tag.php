<?php

namespace App\Models\Credential;

use App\Models\Model;
use App\Models\User;

class Tag extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
