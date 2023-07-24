<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show Register/Create Form
    public function index()
    {
        $users = User::all();

        return view('pages.users', compact('users'));
    }

    public function show()
    {
        return view('pages.create-users');
    }

    // Create New User
    public function create(UserRequest $req)
    {
        User::create([
            'name' => $req['name'],
            'role' => $req['role'],
            'email' => $req['email'],
            'password' => Hash::make($req['password']),
            'contact' => $req['contact'],
            'description' => $req['description'],
            'job' => $req['job'],
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        return redirect(route('users'))->with("success", "Congratulations");
    }
}
