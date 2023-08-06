<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        $logs = Log::all();

        return view('pages.logs')->with('logs', $logs);
    }
}
