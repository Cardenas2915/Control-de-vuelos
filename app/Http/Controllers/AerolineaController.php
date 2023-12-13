<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AerolineaController extends Controller
{
    //
    public function index(){
        $aerolineas = Aerolinea::paginate(5);

        return view("admin.aerolinea.index", [
            "aerolineas"=> $aerolineas
        ]);
    }

    public function store(Request $request)
    {
        $imagen = $request->file('imagen') ;

        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make($imagen) ;

        $imagenPath = public_path('uploads') . "/" . $nombreImagen;
        $imagenServidor->save($imagenPath);
        
        Aerolinea::create([
            "name" => $request["nombre"],
            'imagen' => $nombreImagen,
        ]);

        session()->flash('success','Registro exitoso!');

        return back();
    }
}
