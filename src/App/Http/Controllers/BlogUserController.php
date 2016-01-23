<?php

namespace Facilinfo\Blog\App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;

use App\User;
use Facilinfo\Blog\App\Http\Requests\BlogUserCreateRequest;
use Facilinfo\Blog\App\Http\Requests\BlogUserUpdateRequest;

use Facilinfo\Blog\App\Repositories\BlogUserRepository;

use Illuminate\Http\Request;
use DB;


class BlogUserController extends Controller
{
    protected $userRepository;

    protected $nbrPerPage = 10;

    public function __construct(BlogUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users =User::all();

        return view('blog::blog.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = [''=>''] +DB::table('roles')->lists('name','id');
        $role=config('blog.default-role-id');
                $user = new User();
        return view('blog::blog.users.create', compact('user', 'roles', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogUserCreateRequest $request)
    {
        $user = $this->userRepository->store($request->all());

        return redirect(route('blog.users.index'))->withSuccess("L'utilisateur " . $user->title . " a été créé.");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = [''=>''] +DB::table('roles')->lists('name','id');
        $user = $this->userRepository->getById($id);
        $role=$user->roles[0]->id;
        return view('blog::blog.users.edit',  compact('user', 'roles', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogUserUpdateRequest $request, $id)
    {
        $this->userRepository->update($id, $request->all());

        return redirect(route('blog.users.index'))->withSuccess("L'utilisateur " . $request->input('title') . "   a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->getById($id);

        $this->userRepository->destroy($id);

        return redirect(route('blog.users.index'))->withSuccess("L'utilisateur " . $user->title . " a été supprimé.");

    }
}
