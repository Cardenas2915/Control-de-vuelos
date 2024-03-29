<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use App\Models\Destino;
use App\Models\Aerolinea;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    //
    public function create()
    {
        $destinos = Destino::all();
        $aerolineas = Aerolinea::all();

        return view("admin.vuelos.register", [
            "aerolineas" => $aerolineas,
            "destinos" => $destinos
        ]);
    }

    public function edit($id){

        $vuelo = Vuelo::where('id', $id)->get();
        $destinos = Destino::all();
        $aerolineas = Aerolinea::all();

        return view("admin.vuelos.edit", [
            "vuelo" => $vuelo,
            "aerolineas" => $aerolineas,
            "destinos" => $destinos
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            "aerolinea" => ["required", "integer"],
            "destino" => ["required", "integer"],
            "sala" => ["required", "string"],
            "hora_salida" => ["required", "date_format:H:i"],
            "hora_llegada" => ["required", "date_format:H:i"],
        ]);

        $codigo = Str::random(6);

        // Asegúrate de que el código generado no exista ya en la base de datos
        while (Vuelo::where('codigo', $codigo)->exists()) {
            $codigo = Str::random(6);
        }

        Vuelo::create([
            "codigo" => $codigo,
            "aerolinea_id" => $datos['aerolinea'],
            "destino_id" => $datos["destino"],
            "sala" => $datos["sala"],
            "hora_salida" => $datos["hora_salida"],
            "hora_llegada" => $datos["hora_llegada"]
        ]);

        session()->flash('created', ' Registro exitoso del vuelo!');
        return redirect()->route('vuelos');
    }

    public function update(Request $request)
    {
        $datos = $request->validate([
            "aerolinea" => ["required", "integer"],
            "destino" => ["required", "integer"],
            "sala" => ["required", "string"],
            "hora_salida" => ["required", "date_format:H:i"],
            "hora_llegada" => ["required", "date_format:H:i"],
        ]);

        $vuelo = Vuelo::find($request->id);
        $vuelo->aerolinea_id = $datos['aerolinea'];
        $vuelo->destino_id = $datos["destino"];
        $vuelo->sala = $datos["sala"];
        $vuelo->hora_salida = $datos["hora_salida"];
        $vuelo->hora_llegada = $datos["hora_llegada"];
        $vuelo->save();
        

        session()->flash('edit', 'Datos Actualizados!');
        return redirect()->route('vuelos');
    }
}
