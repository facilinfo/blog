<?php

namespace Facilinfo\Blog\App\Http\Controllers;

use Facilinfo\Blog\Models\BlogPost;
use Illuminate\Routing\Controller as Controller;

use Facilinfo\Blog\App\Http\Requests\BlogPostCreateRequest;
use Facilinfo\Blog\App\Http\Requests\BlogPostUpdateRequest;

use Facilinfo\Blog\App\Repositories\BlogPostRepository;

use Illuminate\Http\Request;
use Auth;
use DB;



class BlogPostController extends Controller
{
    protected $postRepository;

    protected $nbPerPage=5;

    public function __construct(BlogPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
       /* $this->middleware('auth', ['except' => ['index', 'show', 'byMonth', 'byCategory', 'search']]);
        $this->middleware('author', ['only' => ['private_index','edit', 'create', 'update', 'store']]);
        $this->middleware('admin', ['only' => ['destroy']]);
       */
    }


    public function byCategory($id)
    {
        $posts = $this->postRepository->getByCategory($id, $this->nbPerPage);
        $links = str_replace('/?', '?', $posts->render());
        $categoryName=$posts[0]->category->title;
        return view('front.index', compact('posts', 'links', 'categoryName'));
    }

    public function byMonth($month, $year)
    {
        $posts = $this->postRepository->getByMonth($month, $year, $this->nbPerPage);
        $links = str_replace('/?', '?', $posts->render());
        return view('front.index', compact('posts', 'links', 'month', 'year'));
    }

    public function index()
    {
        $posts = $this->postRepository->get();

        return view('blog::blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = [''=>''] +DB::table('categories')->lists('title','id');
        $post=new BlogPost();

        return view('blog::blog.posts.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $post = $this->postRepository->store($request->all());

        return redirect(route('blog.posts.index'))->withSuccess("L'article " . $post->title . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $post = $this->postRepository->getBySlug($slug);

        return view('front.single',  compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);


            $categories = DB::table('categories')->lists('title','id');
            return view('blog::blog.posts.edit',  compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {

        $this->postRepository->update($id, $request->all());

        return redirect(route('blog.posts.index'))->withSuccess("L'article " . $request->input('title') . "   a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post=$this->postRepository->getById($id);
        $this->postRepository->destroy($id);

        return redirect(route('blog.posts.index'))->withSuccess("L'article $post->title a été supprimé.");
    }

    public function search(Request $request){

        $search=$request['search'];
        $posts=$this->postRepository->search($search, $this->nbPerPage);
        $links = str_replace('/?', '?', $posts->render());
        return view('front.index', compact ('posts', 'links', 'search'));
    }

}
