<?php

namespace Facilinfo\Blog\App\Http\Requests;

use App\Http\Requests\Request;

class BlogUserCreateRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => "required|min:2|max:255|unique:users,name",
            'email' => "required|email|unique:users,email"
        ];
    }

}