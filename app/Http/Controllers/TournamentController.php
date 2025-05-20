<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class TournamentController extends Controller
{
    
    public function show($id)
    {
        $torneo = Tournament::findOrFail($id);
        return response()->json($torneo);
    }
    
}
