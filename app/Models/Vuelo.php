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

    public function aerolineas()
    {
        return $this->belongsTo(Aerolinea::class,'id');
    }

    public function destinos()
    {
        return $this->belongsTo(Destino::class,'id');
    }
}
