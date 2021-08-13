<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

class GetUsersList extends Request
{
    protected array $allowed = [];

    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }
}