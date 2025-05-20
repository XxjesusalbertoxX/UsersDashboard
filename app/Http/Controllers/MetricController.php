<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MetricController extends Controller
{
    public function index()
    {
        $maleCount = \App\Models\User::where('genre', 'male')->count();
        $femaleCount = \App\Models\User::where('genre', 'female')->count();

        return view('admin.dashboard', compact('maleCount', 'femaleCount'));
    }
}
