<?php

namespace Facilinfo\Blog\App\Repositories;

use Facilinfo\Blog\Models\BlogCategory;
use Facilinfo\Blog\App\BlogPost;
use Illuminate\Support\Str;

class BlogCategoryRepository
{
    protected $category;

    public function __construct(BlogCategory $category)
    {
        $this->category = $category;


    }

    private function save(BlogCategory $category, Array $inputs)
    {
        $category->title = ucfirst($inputs['title']);
        $category->slug = Str::slug($inputs['title'], '-');

        $category->save();
    }



    public function getPaginate($n)
    {
        return $this->category
            ->orderBy('categories.title')
            ->paginate($n);
    }

    public function store(Array $inputs)
    {
        $category = new $this->category;


        $this->save($category, $inputs);

        return $category;
    }

    public function getById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {

        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {


        $this->getById($id)->delete();
    }

}