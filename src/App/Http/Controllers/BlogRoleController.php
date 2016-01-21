<?php

namespace Facilinfo\Blog\App\Http\Controllers;

use Bican\Roles\Models\Permission;
use Illuminate\Routing\Controller as Controller;

use Facilinfo\Blog\App\Http\Requests\BlogRoleCreateRequest;
use Facilinfo\Blog\App\Http\Requests\BlogRoleUpdateRequest;

use Facilinfo\Blog\App\Repositories\BlogRoleRepository;

use \Bican\Roles\Models\Role;

use Illuminate\Http\Request;

class BlogRoleController extends Controller
{
    protected $roleRepository;

    protected $nbrPerPage = 10;

    public function __construct(BlogRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles =Role::All();

        return view('blog::blog.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $role = new Role();
        $permissions=Permission::All();
        $permitted=array();
        return view('blog::blog.roles.create', compact('role', 'permissions', 'permitted'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogRoleCreateRequest $request)
    {
        $role = $this->roleRepository->store($request->all());

        return redirect(route('blog.roles.index'))->withSuccess("Le rôle " . $role->name . " a été créé.");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->getById($id);
        $permissions=Permission::All();

        foreach($role->permissions as $permission){
            $permitted[]=$permission->id;
        }
        return view('blog::blog.roles.edit',  compact('role', 'permissions', 'permitted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogRoleUpdateRequest $request, $id)
    {
        $this->roleRepository->update($id, $request->all());

        return redirect(route('blog.roles.index'))->withSuccess("Le rôle " . $request->input('name') . "   a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->getById($id);

        $this->roleRepository->destroy($id);

        return redirect(route('blog.roles.index'))->withSuccess("Le rôle " . $role->name . " a été supprimé.");

    }
}
