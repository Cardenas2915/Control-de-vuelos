<?php

namespace Database\Seeders;

use App\Models\Aerolinea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AerolineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $aerolineas = [

            [
                'name' => "Latam Airlines",
                'imagen' => "logo-latam.png",
            ],
            [
                'name' => "Clic",
                'imagen' => "logo-clic.png",
            ],
            [
                'name' => "Satena",
                'imagen' => "logo-satena.png",
            ],
            [
                'name' => "Avianca",
                'imagen' => "logo-avianca.png",
            ],
            [
                'name' => "Wingo",
                'imagen' => "logo-wingo.jpg",
            ],

        ];

        foreach ($aerolineas as $aerolinea) {
            Aerolinea::create($aerolinea);
        }
    }
}
