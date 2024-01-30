<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class PasajeroController extends Controller
{
    //
    public function index($id)
    {
        $vuelo = Vuelo::where('id', $id)->get();
        $pasajeros = Pasajero::where('vuelo_id', $id)->get();


        return view("admin.pasajeros.ver-todos", [
            'vuelo' => $vuelo,
            'pasajeros' => $pasajeros
        ]);
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
            'email' => ['required', 'unique:pasajeros'],
            'phone' => ['required', 'string'],
            'vuelo' => ['required', 'integer']
        ]);

        // Obtener el archivo de imagen de la solicitud
        $imagen = $request->file('foto');
        
        // Generar un nombre único para la imagen
        $nombreImagen = uniqid() . '.' . $imagen->getClientOriginalExtension();
        
        // Guardar la imagen en la carpeta de almacenamiento público
        $imagen->move(public_path('/user'), $nombreImagen);

        Pasajero::create([
            'identificacion' => $datos['identificacion'],
            'name' => $datos['name'],
            'last_name' => $datos['last_name'],
            'email' => $datos['email'],
            'telefono' => $datos['phone'],
            'vuelo_id' => $datos['vuelo'],
            'foto' => $nombreImagen ?? 'default.jpg'
        ]);

        session()->flash('created', 'Pasajero registrado!');
        return redirect()->route('pasajeros');
    }
}
