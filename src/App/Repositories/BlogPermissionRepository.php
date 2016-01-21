<?php

namespace Facilinfo\Blog\App\Repositories;

use \Bican\Roles\Models\Permission;
use Illuminate\Support\Str;

class BlogPermissionRepository
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    private function save(Permission $permission, Array $inputs)
    {
        $permission->name = ucfirst($inputs['name']);
        $permission->slug = Str::slug($inputs['name'], '-');
        $permission->description = $inputs['description'];
        $permission->model=$inputs['model'];

        $permission->save();
    }



    public function getPaginate($n)
    {
        return $this->permission
            ->orderBy('permissions.name')
            ->paginate($n);
    }

    public function store(Array $inputs)
    {
        $permission = new $this->permission;

        $this->save($permission, $inputs);

        return $permission;
    }

    public function getById($id)
    {
        return $this->permission->findOrFail($id);
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