<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolPermisoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\EncomiendasController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\VentasPasajesController;
use App\Http\Controllers\ViajesController;
use App\Http\Controllers\TipoDocumentoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('roles', RoleController::class);
Route::apiResource('permisos', PermisoController::class);
Route::apiResource('roles_permisos', RolPermisoController::class);
/* Route::apiResource('clientes', ClientesController::class);
Route::apiResource('vehiculos', VehiculosController::class);
Route::apiResource('auditoria', AuditoriaController::class)->only(['index', 'show']);
Route::apiResource('encomiendas', EncomiendasController::class);
Route::apiResource('pagos', PagosController::class);
Route::apiResource('paquetes', PaquetesController::class);
Route::apiResource('ventas-pasajes', VentasPasajesController::class);
Route::apiResource('viajes', ViajesController::class);
Route::apiResource('tipos-documento', TipoDocumentoController::class); */
