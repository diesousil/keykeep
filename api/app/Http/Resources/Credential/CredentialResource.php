<?php

namespace App\Http\Resources\Credential;

use App\Http\Resources\Resource;
use App\Http\Resources\Credential\TagResource;
use Illuminate\Http\Request;

class CredentialResource extends Resource
{
    public function toArray(Request $request): array
    {
        $data = [
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'url'               => $this->url,
            'observations'      => $this->observations,
            'username'          => $this->username
        ];

        $data['tags'] = $this->when(
            $this->relationLoaded('tags') && $this->tags,
            fn () => TagResource::collection($this->tags)
        );

        return $data;
    }

}
