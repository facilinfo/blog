<?php

namespace Facilinfo\Blog\App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;

use Facilinfo\Blog\Models\BlogCategory;
use Facilinfo\Blog\App\Http\Requests\BlogCategoryCreateRequest;
use Facilinfo\Blog\App\Http\Requests\BlogCategoryUpdateRequest;

use Facilinfo\Blog\App\Repositories\BlogCategoryRepository;

use Facilinfo\Blog\Models\BlogUser;

use Illuminate\Http\Request;
use Auth;

class BlogCategoryController extends Controller
{
    protected $categoryRepository;

    protected $nbrPerPage = 10;

    public function __construct(BlogCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
       // $user=new BlogUser();
        $user=Auth::user();
        $categories =BlogCategory::all();

        return view('blog.categories.index', compact('categories', 'user'));
    }



    public function private_index()
    {
        $categories =Category::all();

        return view('blog.categories.private_index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = new BlogCategory();
        return view('blog.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $category = $this->categoryRepository->store($request->all());

        return redirect('blog/categories')->withSuccess("La catégorie " . $category->title . " a été créée.");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->getById($id);
        if(Auth::user() || Auth::user()->role=='author'){
            return view('blog.categories.edit',  compact('category'));
        }
        else
        {
            return view('errors.403');
        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $this->categoryRepository->update($id, $request->all());

        return redirect('blog/categories')->withSuccess("La catégorie " . $request->input('title') . "   a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->getById($id);

        $this->categoryRepository->destroy($id);

        return redirect('blog/categories')->withSuccess("La catégorie " . $category->title . " a été supprimée.");

    }
}
