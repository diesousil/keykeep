<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Request;
use Illuminate\Support\Str;

class CreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'user_id'     => 'required|exists:users,id',
            'name'        => 'required|max:255',
            'slug'        => 'required|max:255',
            'description' => 'nullable',
        ];
    }

    public function prepareForValidation(): void
    {
        $dataToSet = [];

        if (!$this->user_id) {
            $dataToSet['user_id'] = auth()->user()->id;
        }

        if (!$this->slug) {
            $dataToSet['slug'] = Str::slug($this->name);
        }

        $this->merge($dataToSet);

    }
}
