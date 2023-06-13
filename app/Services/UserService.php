<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('index'));
    }
}