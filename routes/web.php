<?php

use App\Http\Controllers\AerolineaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\PasajeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VueloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dorado/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dorado/Aerolineas', [AerolineaController::class,'index'])->middleware(['auth', 'verified'])->name('aerolineas');
Route::post('/dorado/aerolineas/register', [AerolineaController::class,'store'])->name('register.aerolinea');

Route::get('/dorado/Destinos', [DestinoController::class,'index'])->middleware(['auth', 'verified'])->name('destinos');
Route::post('/dorado/register/destino', [DestinoController::class,'store'])->name('register.destino');
Route::post('/dorado/update/destino', [DestinoController::class,'update']);
Route::get('/dorado/delete/{id}', [DestinoController::class,'delete'])->name('delete.destino');

Route::get('/dorado/pasajeros/registrar', [PasajeroController::class,'create'])->middleware(['auth', 'verified'])->name('pasajeros');
Route::get('/dorado/pasajeros/{id}', [PasajeroController::class,'index'])->middleware(['auth', 'verified'])->name('todos.pasajeros');
Route::post('/dorado/pasajeros/registrar', [PasajeroController::class,'store'])->name('pasajero.register');

Route::get('/dorado/dashboard/vuelos', [VueloController::class,'create'])->middleware(['auth','verified'])->name('vuelos');
Route::get('/dorado/dashboard/editar/{id}', [VueloController::class,'edit'])->middleware(['auth','verified'])->name('edit.vuelos');
Route::post('/dorado/vuelos/edit', [VueloController::class,'update'])->name('update.vuelo');
Route::post('/dorado/vuelos/crear', [VueloController::class,'store'])->name('crear.vuelo');
require __DIR__.'/auth.php';
