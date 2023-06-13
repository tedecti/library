<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $userRepository;
    private $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $user = Auth::guard('user')->user();
        if ($user['role_id'] == 2) {
            $get = $this->userRepository->get();
            return view('admin.index', compact('get'));
        } else {
            return redirect()->back()->with('error', 'У вас нет доступа к этой странице');
        }
    }

    public function destroy(User $user)
    {
        $this->userService->destroy($user);
    }
}
