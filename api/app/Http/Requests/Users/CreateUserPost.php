<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

class CreateUserPost extends Request
{
    protected array $allowed = [
        'name',
        'email',
        'phone_number',
        'password',
    ];

    public function messages(): array
    {
        return [
            'required'   => 'required',
            'email'      => 'type',
            'string'     => 'type',
            'numeric'    => 'type',
            'unique'     => 'not_unique',
        ];
    }

    public function rules(): array
    {
        return [
            'name'           => 'required|string',
            'email'          => 'email',
            'phone_number'   => 'required|numeric|unique:phone_numbers,phone_number',
            'password'       => 'required|string',
        ];
    }
}