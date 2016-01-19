<?php

namespace Facilinfo\Blog\App\Http\Requests;

use App\Http\Requests\Request;

class BlogCategoryUpdateRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id=$this->get('id');

        return [
            'title' => "required|min:2|max:255|unique:categories,title,$id"
        ];
    }

}