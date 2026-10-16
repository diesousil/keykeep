<?php

namespace App\Http\Resources\Credential;

use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class CredentialResource extends Resource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'url'               => $this->url,
            'observations'      => $this->observations,
            'username'          => $this->login
        ];
    }
}
