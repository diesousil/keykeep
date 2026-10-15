<?php

namespace App\Http\Requests\Credential;

use App\Http\Requests\Request;

class EditPasswordRequest extends Request
{
    public function rules(): array
    {
        return [
            'password' => 'required|max:255'
        ];
    }
}
