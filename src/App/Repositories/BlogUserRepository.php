<?php

namespace Facilinfo\Blog\App\Repositories;

use App\User;
use Illuminate\Support\Str;

class BlogUserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    private function save(User $user, Array $inputs)
    {
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        if(isset( $inputs['confirmed'])) $confirmed=1; else $confirmed=0;
        $user->confirmed=$confirmed;
        if(isset( $inputs['notify'])) $notify=1; else $notify=0;
        $user->notify=$notify;
        if(isset( $inputs['avatar'])) $avatar=1; else $avatar=0;
        $user->avatar=$avatar;

        $user->save();
    }

    public function store(Array $inputs)
    {
        $user = new $this->user;

        $this->save($user, $inputs);
        $user->detachRoleAll();
        $user->attachRole($inputs['role_id']);
        return $user;
    }

    public function getById($id)
    {
        return $this->user->with('roles')->findOrFail($id);
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