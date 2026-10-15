<?php

namespace App\Http\Requests\Credential;

use App\Http\Requests\Request;

class EditRequest extends Request
{
    public function rules(): array
    {
        return [
            'title'        => 'required|max:255',
            'description'  => 'nullable',
            'url'          => 'nullable',
            'login'        => 'nullable',
            'observations' => 'nullable',
            'tags'         => 'array',
            'tags.*'       => 'exists:tags,id'
        ];
    }
}
