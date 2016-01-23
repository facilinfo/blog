<?php

namespace Facilinfo\Blog\App\Http\Requests;

use App\Http\Requests\Request;

class BlogUserUpdateRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id=$this->get('id');

        return [
            'name' => "required|min:2|max:255|unique:users,name,$id",
            'email' => "required|email|unique:users,email,$id"
        ];
    }

}