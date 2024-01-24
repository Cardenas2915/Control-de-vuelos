<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __invoke()
    {
        $vuelos = Vuelo::all();
        $vuelos->load("destinos", 'aerolineas');
        
        return view("admin.vuelos.dashboard",[
            "vuelos"=> $vuelos
        ]);
    }
}
