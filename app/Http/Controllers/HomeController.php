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

    public function create()
    {
        return view('pages.create');
    }

    public function createEntity(Request $request)
    {

        // Validate the incoming request data
        Validator::make($request->all(), [
            'action' => 'required|string',
            'other' => 'required|string',
            'location' => 'required|string',
            'incoming_cable' => 'required|string',
            'incoming_buffer' => 'required|string',
            'incoming_core' => 'required|string',
            'outgoing_cable' => 'required|string',
            'outgoing_buffer' => 'required|string',
            'outgoing_core' => 'required|string',
            'user_id' => 'nullable|integer',
            'user_email' => 'nullable|email',
        ]);

        // Check if the validation fails
        // if ($validator->fails()) {
        //     return redirect()->route('create')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Create a new entry and save it to the database
        Entry::create($request->all());

        // Redirect back to the form with a success message
        return redirect(route('entry-show'))->with("success", "Entry created successfully");
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

    public function viewEntity($id)
    {
        $entity = Entry::findOrFail($id);

        return view('pages.view-entry')->with('entity', $entity);
    }

    public function destroyEntity($id)
    {
        $entity = Entry::findOrFail($id);

        $entity->delete();

        return redirect()->route('dashboard')->with('success', 'Record deleted successfully.');
    }

    public function showEntry()
    {
        return view('pages.update-entry');
    }

    public function updateEntry($id, $entity)
    {
    }

    // Count number of entries daily to display on dashboard
    public function countDailyEntries()
    {
        $entities = Entry::all()->count();

        return view('pages.dashboard')->with('entities', $entities);
    }

    // Count number of entries monthly to display on dashboard
    public function countMonthlyEntries()
    {
        $entities = Entry::all()->count();

        return view('pages.dashboard')->with('entities', $entities);
    }
}
