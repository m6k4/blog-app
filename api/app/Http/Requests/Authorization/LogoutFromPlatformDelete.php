<?php

namespace App\Http\Requests\Authorization;

use App\Http\Requests\Request;

class LogoutFromPlatformDelete extends Request
{
    protected $allowed = [];

    public function messages(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }
}