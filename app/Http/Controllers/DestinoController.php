<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    //
    public function index()
    {
        $destinos = Destino::paginate(10);
        return view("admin.destinos.index", [
            "destinos" => $destinos
        ]);
    }

    public function store(Request $request)
    {
        $destinos = $request->input('datos');

        foreach ($destinos as $destino) {
            Destino::create([
                "name" => $destino["name"],
                'codigo' => $destino['iata'],
                'aeropuerto' => $destino['aeropuerto'],
            ]);
        }

        //respuesta a la peticion
        return response()->json(['message' => $destino['name']]);
    }

    public function update(Request $request)
    {
        $destinos = $request->input('datos');

        foreach ($destinos as $destino) {

            $item = Destino::find($destino['id']);
            $item->name = $destino['name'];
            $item->codigo = $destino['iata'];
            $item->aeropuerto = $destino['aeropuerto'];
            $item->save();
        }

        //respuesta a la peticion
        return response()->json(['message' => $destino['name']]);
    }

    public function delete(Request $request)
    {
        // Obtén el ID del destino desde la solicitud
        $destinoId = $request->id;

        // Busca el destino en la base de datos
        $destino = Destino::find($destinoId);

        // Verifica si el destino existe
        if ($destino) {
            // Elimina el destino
            $destino->delete();

            // Puedes devolver una respuesta de éxito, redirigir o hacer cualquier otra cosa que necesites
            //redireccionar al usuario
            session()->flash('delete','Eliminada correctamente');
            return redirect()->route('destinos');
            
        } else {
            // Si el destino no existe, puedes devolver un mensaje de error u otra respuesta
            return response()->json(['message' => 'No se encontró el registro'], 404);
        }
    }
}
