<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Middleware to check if user is authenticated
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the total number of users
        $users = User::all()->count();

        // Retrieve the total number of entries
        $allEntries = Entry::all();

        // Retrieve the data in Entry model to get all the other field data and store in comments variable with pagination
        $comments = Entry::with('user')->latest()->paginate(2);

        // Retrieve the total number of entries for the current day
        $dailyCount = Entry::whereDate('created_at', today())->count();

        // Retrieve the total number of entries for the current month
        $monthlyCount = Entry::whereMonth('created_at', now()->month)->count();

        // Retrieve the data in Entry model to get all the other field data and store in comments variable with pagination
        $entries = Entry::with('user')->latest()->get();

        return view('pages.dashboard', compact(
            'users',
            'allEntries',
            'dailyCount',
            'monthlyCount',
            'entries',
            'comments'
        ));
    }

    public function entryShow()
    { // Retrieve the authenticated user's entry data
        $entities = Entry::where('user_id', Auth::id())->get();

        return view('pages.view-entry', compact('entities'));
    }
}
