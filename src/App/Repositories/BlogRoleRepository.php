<?php

namespace Facilinfo\Blog\App\Repositories;

use \Bican\Roles\Models\Role;
use Illuminate\Support\Str;

class BlogRoleRepository
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    private function save(Role $role, Array $inputs)
    {
        $role->name = ucfirst($inputs['name']);
        if(empty($inputs['slug'])) $role->slug = Str::slug($inputs['name'], '.'); else $role->slug=$inputs['slug'];
        $role->description = $inputs['description'];
        $role->level=$inputs['level'];

        $role->save();
    }

    public function store(Array $inputs)
    {
        $role = new $this->role;

        $this->save($role, $inputs);

        $role->detachAllPermissions();

        foreach ($inputs as $key => $value){

            if($value=='permitted')
                $role->attachPermission($key);
        }

        return $role;
    }

    public function getById($id)
    {
        return $this->role->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $role = $this->getById($id);
        $role->detachAllPermissions();

        foreach ($inputs as $key => $value){

            if($value=='permitted')
                $role->attachPermission($key);
        }
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

}