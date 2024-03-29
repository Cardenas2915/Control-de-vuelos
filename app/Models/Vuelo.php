<?php

namespace App\Models;

use App\Models\Destino;
use App\Models\Aerolinea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vuelo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "codigo",
        "aerolinea_id",
        "destino_id",
        "sala",
        "hora_salida",
        "hora_llegada"
    ];


    public function destinos()
    {
        return $this->hasMany(Destino::class,'id', 'destino_id');
    }

    public function aerolineas()
    {
        return $this->hasMany(Aerolinea::class,'id', 'aerolinea_id');
    }
}
