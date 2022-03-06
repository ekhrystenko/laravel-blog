<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/', [CategoriesController::class, 'home'])->name('admin.home');
    Route::resource('categories', CategoriesController::class)->except('show');
    Route::resource('posts', PostsController::class);
    Route::resource('profile', ProfileController::class)->only('index', 'edit', 'update');
    Route::resource('users', UsersController::class);
});

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/category/{id}', [IndexController::class, 'category'])->name('category');
Route::get('/category/{id}/post/{post_id}', [IndexController::class, 'showPost'])->name('show.post');

Route::get('login/github', [AuthController::class, 'redirectToProvider']);
Route::get('github/callback', [AuthController::class, 'handleProviderCallback']);

