<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
