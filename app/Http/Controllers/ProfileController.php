<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile');
    }

    public function update(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'contact' => 'nullable',
            'description' => 'nullable',
            'job' => 'nullable',
            // Add validation rules for other fields
        ]);

        // Remove leading '0' from the msisdn field (if present)
        $validatedData['contact'] = ltrim($validatedData['contact'], '0');

        // Check if the msisdn field starts with '233'
        if (!Str::startsWith($validatedData['contact'], '233')) {
            // Append '233' as a prefix to the msisdn field
            $validatedData['contact'] = '233' . $validatedData['contact'];
        }

        $user = User::findOrFail($user->id);
        $user->update($validatedData);

        return redirect(route('users'))->with("success", "Profile updated successfully!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePassword()
    {
        return view('pages.change-password');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect(route('profile'))->with("success", "Password successfully changed!");
    }
}
