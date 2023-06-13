<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public function register(AuthRequest $request)
    {
        $data = $request->validated();
        DB::transaction(function () use ($data) {
            User::create([
                'fio' => $data["fio"],
                'email' => $data["email"],
                'password' => Hash::make($data["password"]),
            ]);
        });
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        return $credentials;
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
    }

}
