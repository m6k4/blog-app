<?php

namespace App\Http\Requests\Authorization;

use App\Http\Requests\Request;
use Illuminate\Http\Request as BaseRequest;

class LoginToPlatformPost extends Request
{
    protected $allowed = [
        'phone_number',
        'password',
    ];
    
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'required'                 => 'required',
            'string'                   => 'type',
            'numeric'                  => 'type',
            'phone_number.exists'      => 'wrong phone_number or password',
        ];
    }

    public function rules(BaseRequest $request): array
    {
        return [
            'phone_number'   => 'required|numeric',
            'password'       => 'required|string',
        ];
    }
}