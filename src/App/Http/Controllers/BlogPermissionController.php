<?php

namespace Facilinfo\Blog\App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;

use Facilinfo\Blog\App\Http\Requests\BlogPermissionCreateRequest;
use Facilinfo\Blog\App\Http\Requests\BlogPermissionUpdateRequest;

use Facilinfo\Blog\App\Repositories\BlogPermissionRepository;

use \Bican\Roles\Models\Permission;

use Illuminate\Http\Request;

class BlogPermissionController extends Controller
{
    protected $permissionRepository;

    protected $nbrPerPage = 10;

    public function __construct(BlogPermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions =Permission::all();

        return view('blog::blog.permissions.index', compact('permissions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permission = new Permission();
        return view('blog::blog.permissions.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogPermissionCreateRequest $request)
    {
        $permission = $this->permissionRepository->store($request->all());

        return redirect(route('blog.permissions.index'))->withSuccess("La permission " . $permission->name . " a été créée.");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->getById($id);
        return view('blog::blog.permissions.edit',  compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogPermissionUpdateRequest $request, $id)
    {
        $this->permissionRepository->update($id, $request->all());

        return redirect(route('blog.permissions.index'))->withSuccess("La permission " . $request->input('name') . "   a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->getById($id);

        $this->permissionRepository->destroy($id);

        return redirect(route('blog.permissions.index'))->withSuccess("La permission " . $permission->name . " a été supprimée.");

    }
}
