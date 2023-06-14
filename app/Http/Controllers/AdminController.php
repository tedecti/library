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
        $get = $this->userRepository->get();
        return view('admin.index', compact('get'));
    } 

    public function destroy($id)
    {
        $this->userService->destroy($id);
    }
}
