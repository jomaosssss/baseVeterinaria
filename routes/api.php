<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\MascotaVacunaController;
use App\Http\Controllers\TipoMascotaController;
use App\Http\Controllers\VacunasController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('clientes',ClienteController::class);
Route::apiResource('usuarios',UsuarioController::class);
Route::apiResource('mascotas',MascotaController::class);
Route::apiResource('tipo_mascotas',TipoMascotaController::class);
Route::apiResource('vacunas',VacunasController::class);
Route::apiResource('mascota_vacunas',MascotaVacunaController::class);
