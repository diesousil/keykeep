<?php

namespace App\Models\Credential;

use App\Models\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
