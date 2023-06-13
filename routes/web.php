<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);

Route::get('/signup', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/signin', [UserController::class, 'showLoginForm'])->name('signin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/books', [BookController::class, 'search'])->name('search');
Route::get('/books/create', [BookController::class, 'showCreate']);
Route::post('/books/create', [BookController::class, 'create'])->name('create');

Route::get('/admin/index', [AdminController::class, 'index'])->name('index');
Route::delete('/admin/index', [AdminController::class, 'destroy'])->name('destroy');