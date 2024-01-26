<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'name',
        'last_name',
        'email',
        'telefono',
        'vuelo_id',
        'foto'
    ];
}
