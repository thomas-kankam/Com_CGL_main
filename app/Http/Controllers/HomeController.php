<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entry;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all()->count();
        $entities = Entry::all();

        // Retrieve the authenticated user's entry data
        $ingEntity = Entry::where('user_id', Auth::id())->get();

        $dailyCount = Entry::whereDate('created_at', today())->count();
        $monthlyCount = Entry::whereMonth('created_at', now()->month)->count();

        $entries = Entry::with('user')->latest()->get();

        return view('pages.dashboard', compact(
            'users',
            'entities',
            'dailyCount',
            'monthlyCount',
            'entries',
            'ingEntity'
        ));
    }

    public function crud()
    {
        // Retrieve the authenticated user's entry data
        $entities = Entry::where('user_id', Auth::id())->get();

        return view('pages.crud', compact('entities'));
    }

    public function entryShow()
    { // Retrieve the authenticated user's entry data
        $entities = Entry::where('user_id', Auth::id())->get();

        return view('pages.view-entry', compact('entities'));
    }
}
