<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function get()
    {
        $get = User::select('users.id', 'fio', 'roles.name', 'email', 'role_id', 'users.deleted_at')->join('roles', 'users.role_id', '=', 'roles.id')->get();
        return $get;
    }
}