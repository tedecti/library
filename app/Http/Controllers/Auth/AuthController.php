<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
            $request->validate([
                'fio' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:3',
            ]);

            $user = User::create([
                'fio' => $request->fio,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('/'));
        }
        
        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->withInput(['email']);
            redirect('/');
    }
}
