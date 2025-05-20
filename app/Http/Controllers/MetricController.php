<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\Registration;

class MetricController extends Controller
{
    public function index()
    {
        $data = [
            'maleCount'      => User::where('genre', 'male')->count(),
            'femaleCount'    => User::where('genre', 'female')->count(),
            
            'minorsCount'    => User::where('age', '<', 18)->count(),
            'adultsCount'    => User::where('age', '>=', 18)->count(),
            
            'maleAdults'     => User::where('genre', 'male')->where('age', '>=', 18)->count(),
            'maleMinors'     => User::where('genre', 'male')->where('age', '<', 18)->count(),
            
            'femaleAdults'   => User::where('genre', 'female')->where('age', '>=', 18)->count(),
            'femaleMinors'   => User::where('genre', 'female')->where('age', '<', 18)->count(),

            'tournamentsCount'    => Tournament::count(),
            'teamsCount'          => Team::count(),
            'registrationsCount'  => Registration::count(),
        ];

        return view('admin.dashboard', ['data' => $data]);

    }
}
