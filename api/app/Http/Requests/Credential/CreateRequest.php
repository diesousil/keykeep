<?php

namespace App\Http\Requests\Credential;

use App\Http\Requests\Request;

class CreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'user_id'      => 'required|exists:users,id',
            'title'        => 'required|max:255',
            'description'  => 'nullable',
            'url'          => 'nullable',
            'username'     => 'nullable',
            'password'     => 'required|max:255',
            'observations' => 'nullable',
            'tags'         => 'array',
            'tags.*'       => 'exists:tags,id'
        ];
    }

    public function prepareForValidation(): void
    {
        if (!$this->user_id) {
            $this->merge([
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
