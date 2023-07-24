<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
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

        return redirect()->back()->with("success", "Profile updated successfully!");
    }
}
