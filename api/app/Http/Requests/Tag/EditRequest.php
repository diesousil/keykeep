<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Request;
use Illuminate\Support\Str;

class EditRequest extends Request
{
    public function rules(): array
    {
        return [
            'name'        => 'max:255',
            'slug'        => 'max:255',
            'description' => 'nullable',
        ];
    }

    public function prepareForValidation(): void
    {
        $dataToSet = [];

        if ($this->name && !$this->slug) {
            $dataToSet['slug'] = Str::slug($this->name);
        }

        $this->merge($dataToSet);
    }
}
