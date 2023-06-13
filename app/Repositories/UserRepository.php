<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function get()
    {
        $get = User::join('roles', 'users.role_id', '=', 'roles.id')->get();
        return $get;
    }
}
