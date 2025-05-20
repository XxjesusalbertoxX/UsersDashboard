<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $upcoming = Tournament::whereDate('start_date', '>', $today)
                              ->orderBy('start_date', 'asc')
                              ->get();

        $ongoing = Tournament::whereDate('start_date', '<=', $today)
                             ->whereDate('end_date', '>=', $today)
                             ->orderBy('start_date', 'asc')
                             ->get();

        $finished = Tournament::whereDate('end_date', '<', $today)
                              ->orderBy('end_date', 'desc')
                              ->get();
        // dd($upcoming, $ongoing, $finished); // Uncomment for debugging

        return view('home', compact('upcoming', 'ongoing', 'finished'));
    }
}
