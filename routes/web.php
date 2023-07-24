<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    // View profile page and Edit profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    // Create Entry and post to database
    Route::get('create', [HomeController::class, 'create'])->name('create');
    Route::post('create-entity', [HomeController::class, 'createEntity'])->name('create-entity');

    // users list, Show create users, Add Users
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('show-user', [UserController::class, 'show'])->name('show-user');
    Route::post('create-user', [UserController::class, 'create'])->name('create-user');

    // Show crud page
    Route::get('crud', [HomeController::class, 'crud'])->name('crud');

    // Show entry show page
    Route::get('entry-show', [HomeController::class, 'entryShow'])->name('entry-show');

    // Show entity view
    Route::get('/entity-view/{id}', [HomeController::class, 'viewEntity'])->name('view-entity');

    Route::delete('/entity-destroy/{id}', [HomeController::class, 'destroyEntity'])->name('entity.destroy');

    // Update entry
    Route::get('show-entry', [HomeController::class, 'showEntry'])->name('show-entry');
    Route::put('update-entry', [HomeController::class, 'updateEntry'])->name('update-entry');
});
