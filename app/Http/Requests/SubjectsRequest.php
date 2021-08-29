<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'string',
            'code' => 'string|regex:/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$/',
            'lecturer' => 'nullable|string'
        ];

        if (! $this->route('subject')) {
            $rules['name'] .= '|required';
            $rules['code'] .= '|required';
        }

        return $rules;
    }
}
