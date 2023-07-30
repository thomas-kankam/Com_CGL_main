<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Requests\EntryUpdate;
use App\Http\Requests\EntryRequest;
use Illuminate\Support\Facades\Auth;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if the user is a Super Administrator
        if (Auth::user()->role == 'Super Administrator') {
            // Retrieve all entries for Super Administrator
            $entries = Entry::all();
        } else {
            // Retrieve only the specific user's entries
            $entries = Entry::where('user_id', auth()->id())->get();
        }

        return view('pages.entry-index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.entry-create');
    }

    public function store(EntryRequest $request)
    {
        // Assuming you have the authenticated user
        $user = auth()->user();

        // Get the user's email
        $userEmail = $user->email;

        // Save the entry with the user's email
        Entry::create([
            'user_id' => $user->id,
            'user_email' => $userEmail,
            'action' => $request->action,
            'other' => $request->other,
            'location' => $request->location,
            'incoming_cable' => $request->incoming_cable,
            'incoming_buffer' => $request->incoming_buffer,
            'incoming_core' => $request->incoming_core,
            'outgoing_cable' => $request->outgoing_cable,
            'outgoing_buffer' => $request->outgoing_buffer,
            'outgoing_core' => $request->outgoing_core,
        ]);

        // Redirect back to the form with a success message
        return redirect(route('entry.index'))->with("success", "Entry created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);

        return view('pages.entry-edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        dd($request->all());
        $entry = Entry::find($entry);

        $validatedData = $request->validate([
            'user_email' => 'required|email',
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
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date'
        ]);

        // Update the entry fields with the validated data
        $entry->update($validatedData);

        return redirect()->route('engineer.index')->with('success', 'Record updated successfully.');
    }

    public function ing(Request $request, $id)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'user_email' => 'nullable|email',
            'action' => 'nullable|string',
            'other' => 'nullable|string',
            'location' => 'nullable|string',
            'incoming_cable' => 'nullable|string',
            'incoming_buffer' => 'nullable|string',
            'incoming_core' => 'nullable|string',
            'outgoing_cable' => 'nullable|string',
            'outgoing_buffer' => 'nullable|string',
            'outgoing_core' => 'nullable|string',
            'time' => 'nullable|date',
        ]);

        $entries = Entry::findOrFail($id);
        $entries->update($validatedData);

        return redirect()->route('engineer.index')->with('success', 'Record updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = Entry::findOrFail($id);

        $entity->delete();

        return redirect()->route('entry.index')->with('success', 'Record deleted successfully.');
    }
}
