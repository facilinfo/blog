<?php

namespace Facilinfo\Blog\App\Http\Requests;

use App\Http\Requests\Request;

class BlogPostCreateRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255|unique:posts',
            'body'=> 'required|min:25'
        ];
    }

}