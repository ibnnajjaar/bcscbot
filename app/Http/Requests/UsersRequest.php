<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'string|max:255',
            'email' => 'email',
            'password' => 'nullable|string|max:255|confirmed|min:6',
            'email_verified' => 'bool'
        ];

        if (! $this->route('user')) {
            $rules['name'] .= '|required';
            $rules['email'] .= '|required';
            $rules['password'] .= '|required';
        }

        return $rules;
    }
}
