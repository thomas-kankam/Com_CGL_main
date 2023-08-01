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
        $email = $req->input('email');

        if (!str_ends_with($email, '@comsysghana.com')) {
            return redirect()->back()->withErrors(['email' => 'Email must end with @comsysghana.com']);
        }

        User::create([
            'name' => $req['name'],
            'role' => $req['role'],
            'email' => $email,
            'password' => Hash::make($req['password']),
            'contact' => $req['contact'],
            'description' => $req['description'],
            'job' => $req['job'],
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        return redirect(route('users'))->with("success", "Congratulations! Engineer Created Successfully");
    }

    // Edit User
    public function userEdit($id)
    {
        $user = User::find($id);

        return view('pages.edit-users', compact('user'));
    }

    // Update User
    public function userUpdate(Request $req, $id)
    {
        $req->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);

        if ($req->hasFile('profile_image')) {
            $imagePath = $req->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->update([
            'name' => $req['name'],
            'role' => $req['role'],
            'email' => $req['email'],
            'profile_image' => $user->profile_image,
        ]);

        return redirect(route('users'))->with("success", "User Details Updated Successfully");
    }

    // Delete User
    public function userDelete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(route('users'))->with("success", "User Deleted Successfully");
    }
}
