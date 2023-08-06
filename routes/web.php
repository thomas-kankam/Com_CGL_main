<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EngineerController;

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

Auth::routes();

Route::middleware("guest")->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::middleware(['web', 'auth'])->group(function () {
    // route to admin dashboard
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    // View profile page and Edit profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    // change password
    Route::get('change-password', [ProfileController::class, 'showChangePassword'])->name('changePassword');
    Route::post('change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    // Entry resource controller
    Route::resource('entry', EntryController::class);

    // users list, Show create users, Add Users
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('show-user', [UserController::class, 'show'])->name('show-user');
    Route::post('create-user', [UserController::class, 'create'])->name('create-user');
});
