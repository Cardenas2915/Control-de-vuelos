<?php

namespace Database\Seeders;

use App\Models\Destino;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $destinos = [

            [
                'name' => "Bogotá",
                'codigo' => "BOG",
                'aeropuerto' => "El Dorado International Airport"
            ],
            [
                'name' => "Medellín",
                'codigo' => "MDE",
                'aeropuerto' => "José María Córdova International Airport"
            ],
            [
                'name' => "Cali",
                'codigo' => "CLO",
                'aeropuerto' => "Alfonso Bonilla Aragón International Airport"
            ],
            [
                'name' => "Cartagena",
                'codigo' => "CTG",
                'aeropuerto' => "Rafael Núñez International Airport"
            ],
            [
                'name' => "Barranquilla",
                'codigo' => "BAQ",
                'aeropuerto' => "Ernesto Cortissoz International Airport"
            ],
            [
                'name' => "Santa Marta",
                'codigo' => "SMR",
                'aeropuerto' => "Simón Bolívar International Airport"
            ],
            [
                'name' => "Pereira",
                'codigo' => "PEI",
                'aeropuerto' => "Matecaña International Airport"
            ],
            [
                'name' => "Manizales",
                'codigo' => "MZL",
                'aeropuerto' => "La Nubia Airport"
            ],
            [
                'name' => "Ibagué",
                'codigo' => "IBE",
                'aeropuerto' => "Perales Airport"
            ],
            [
                'name' => "Leticia",
                'codigo' => "LET",
                'aeropuerto' => "Vásquez Cobo International Airport"
            ],
            [
                'name' => "Villavicencio",
                'codigo' => "VVC",
                'aeropuerto' => "La Vanguardia Airport"
            ],
            [
                'name' => "Pasto",
                'codigo' => "PSO",
                'aeropuerto' => "Antonio Nariño Airport"
            ],
            [
                'name' => "Popayán",
                'codigo' => "PPN",
                'aeropuerto' => "Guillermo León Valencia Airport"
            ],
            [
                'name' => "Armenia",
                'codigo' => "AXM",
                'aeropuerto' => "El Edén International Airport"
            ],
            [
                'name' => "Riohacha",
                'codigo' => "RCH",
                'aeropuerto' => "Almirante Padilla Airport"
            ],
            [
                'name' => "Quibdó",
                'codigo' => "UIB",
                'aeropuerto' => "El Caraño Airport"
            ],
            [
                'name' => "Neiva",
                'codigo' => "NVA",
                'aeropuerto' => "Benito Salas Airport"
            ],
            [
                'name' => "Tunja",
                'codigo' => "TUA",
                'aeropuerto' => "Gustavo Rojas Pinilla International Airport"
            ],
            [
                'name' => "Yopal",
                'codigo' => "EYP",
                'aeropuerto' => "El Alcaraván Airport"
            ],
            [
                'name' => "Arauca",
                'codigo' => "AUC",
                'aeropuerto' => "Santiago Pérez Quiroz Airport"
            ],
            [
                'name' => "Bucaramanga",
                'codigo' => "BGA",
                'aeropuerto' => "Palonegro International Airport"
            ],
            [
                'name' => "Cúcuta",
                'codigo' => "CUC",
                'aeropuerto' => "Camilo Daza International Airport"
            ],
            [
                'name' => "Sincelejo",
                'codigo' => "ADZ",
                'aeropuerto' => "Gustavo Rojas Pinilla International Airport"
            ],
            [
                'name' => "Valledupar",
                'codigo' => "VUP",
                'aeropuerto' => "Alfonso López Pumarejo Airport"
            ],
            [
                'name' => "Montería",
                'codigo' => "MTR",
                'aeropuerto' => "Los Garzones Airport"
            ],
            [
                'name' => "San Andrés",
                'codigo' => "ADZ",
                'aeropuerto' => "Gustavo Rojas Pinilla International Airport"
            ],
            [
                'name' => "Florence",
                'codigo' => "FLA",
                'aeropuerto' => "Gustavo Artunduaga Paredes Airport"
            ],

        ];

        foreach ($destinos as $destino) {
            Destino::create($destino);
        }
    }
}
