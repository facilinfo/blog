<?php

namespace Facilinfo\Blog\App\Http\Requests;

use App\Http\Requests\Request;

class BlogRoleUpdateRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id=$this->get('id');

        return [
            'name' => "required|min:2|max:255|unique:roles,name,$id"
        ];
    }

}