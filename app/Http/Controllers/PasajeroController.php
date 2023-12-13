<?php

namespace App\Http\Controllers;

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
        return view("admin.pasajeros.register");
    }
}
