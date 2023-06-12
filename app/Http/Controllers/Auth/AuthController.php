<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Providers\AuthService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(AuthRequest $request)
    {
        $this->authService->register($request);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $this->authService->login($request);
        if (auth('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->withInput(['email']);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect('/');
    }
}
