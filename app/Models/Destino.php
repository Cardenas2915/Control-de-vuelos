<?php

namespace App\Models;

use App\Models\Vuelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destino extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'codigo',
        'aeropuerto'
    ];

}

