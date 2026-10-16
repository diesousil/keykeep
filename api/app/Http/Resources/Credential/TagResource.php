<?php

namespace App\Http\Resources\Credential;

use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class TagResource extends Resource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description
        ];
    }
}
