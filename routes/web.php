<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

// Routes for admin
Route::middleware('role:admin')->group(function () {
    // Routes accessible to admins only
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    // Add more admin-specific routes here
});

// Routes for clients
Route::middleware('role:client')->group(function () {
    // Routes accessible to clients only
    Route::get('/dashboard', [ClientController::class, 'dashboard']);
    // Add more client-specific routes here
});
