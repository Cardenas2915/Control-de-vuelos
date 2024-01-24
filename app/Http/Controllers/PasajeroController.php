<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class PasajeroController extends Controller
{
    //
    public function index()
    {
        
        return view("admin.pasajeros.index");
    }

    public function create()
    {
        $vuelos = Vuelo::all();
        return view("admin.pasajeros.register" ,[
            "vuelos" => $vuelos 
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'identificacion' => ['required','integer'],
            'name' => ['required','string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'unique:Pasajeros'],
            'phone' => ['required', 'integer'],
            'vuelo' => ['required', 'integer'],
        ]);

        Pasajero::create([
            'identificacion' => $datos['identificacion'],
            'name' => $datos['name'],
            'last_name' => $datos['last_name'],
            'email' => $datos['email'],
            'telefono' => $datos['phone'],
            'vuelo' => $datos['vuelo'],
            'foto' => 'default.jpg'
        ]);
    }
}
