<?php

use App\Http\Controllers\CitaController;

use App\Http\Controllers\ModulosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\CheckVehiculo;
use App\Http\Middleware\recepcion;
use App\Http\Middleware\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpleadosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::head('', function () {
return 'accediste';
})->middleware('admin');
Route::get('no-autorizado', function () {
return "Usuario no autorizado";
});*/

// la autentificacion con middleware se realizo de esta forma para poder ser probado con POSTMAN

// routas para Empleados - Administradores
// estos vatos necesitan mandar datos de la sigueinte manera ['id' => '*id*']
// los administradores y recepcionistas tienen un acceso total sin importar si operan en un modulo u otro
//  ellos pueden checar citas y empleados de otros modulos y/o modificarlos

Route::middleware([Admin::class])->group(function () {

    Route::get('/usuarios', [UsuariosController::class, "index"]);
    Route::post('/usuarios/update', [UsuariosController::class, 'update']);

    Route::get('/citas', [CitaController::class, 'index']);

    Route::get('/citas/verModulos', [CitaController::class, 'showModulo']);

    Route::post('/citas/update', [CitaController::class, 'update']);

    Route::get('/empleado', [EmpleadosController::class, 'index']);
    Route::post('/empleado', [EmpleadosController::class, 'store']);
    Route::get('/empleado/buscar', [EmpleadosController::class, 'show']);
    Route::delete('/empleado', [EmpleadosController::class, 'destroy']);
    Route::post('/empleado/update', [EmpleadosController::class, 'updateEmpleado']);

    Route::post('/modulos', [ModulosController::class, 'store']);
    Route::get('/modulos', [ModulosController::class, 'index']);
    Route::get('/modulos/buscar', [ModulosController::class, 'show']);
    Route::post('/modulos/update', [ModulosController::class, 'update']);

    Route::get('/vehiculos', [VehiculosController::class, 'index']);
    Route::post('/vehiculos', [VehiculosController::class, 'store']);
    Route::get('/vehiculos/buscar_id', [VehiculosController::class, 'show']);
    Route::delete('/vehiculos', [VehiculosController::class, 'destroy']); //baja de vehiculo
    Route::post('/vehiculos/cambiarpropietario', [VehiculosController::class, 'updateCambioPropietario']);

});

// rutas para Usuarios
// estos vatos necesitan mandar datos de la sigueinte manera ['id' => '*id*']
// estos estan limitados a solo ver estados de citas y ver vehiculos que puedan estar agregados
// solo pueden agendar citas si estan registrados
Route::middleware([User::class])->group(function () {
    Route::get('/usuarios/buscar', [UsuariosController::class, 'show']);
    Route::post('/citas', [CitaController::class, 'store']);
    Route::get('/citas/verUsuario', [CitaController::class, 'showUsuario']);
    Route::get('/citas/verVehiculos', [CitaController::class, 'showVehiculo']);
    Route::get('/citas/verEstado', [CitaController::class, 'showEstado']);
    Route::get('/vehiculos/buscar_dueño', [VehiculosController::class, 'show_dueño']);

});

//no se requiere de contar con usuario o ser administrador para crear un nuevo usuario
Route::post('/usuarios', [UsuariosController::class, 'store']);

/* //rutas a lo pelon
Route::get('/usuarios', [UsuariosController::class, "index"]);
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::get('/usuarios/buscar', [UsuariosController::class, 'show']);
Route::post('/usuarios/update', [UsuariosController::class, 'update']);
Route::get('/usuarios', [UsuariosController::class, "index"]);
Route::get('/citas', [CitaController::class, 'index']);
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas/verModulos', [CitaController::class, 'showModulo']);
Route::get('/citas/verUsuario', [CitaController::class, 'showUsuario']);
Route::get('/citas/verVehiculos', [CitaController::class, 'showVehiculo']);
Route::get('/citas/verEstado', [CitaController::class, 'showEstado']);
Route::post('/citas/update', [CitaController::class, 'update']);
Route::get('/empleado', [EmpleadosController::class, 'index']);
Route::post('/empleado', [EmpleadosController::class, 'store']);
Route::get('/empleado/buscar', [EmpleadosController::class, 'show']);
Route::delete('/empleado', [EmpleadosController::class, 'destroy']);
Route::post('/empleado/update', [EmpleadosController::class, 'updateEmpleado']);
Route::post('/modulos', [ModulosController::class, 'store']);
Route::get('/modulos', [ModulosController::class, 'index']);
Route::get('/modulos/buscar', [ModulosController::class, 'show']);
Route::post('/modulos/update', [ModulosController::class, 'update']);
Route::get('/vehiculos', [VehiculosController::class, 'index']);
Route::post('/vehiculos', [VehiculosController::class, 'store']);
Route::get('/vehiculos/buscar_dueño', [VehiculosController::class, 'show_dueño']);
Route::get('/vehiculos/buscar_id', [VehiculosController::class, 'show']);
Route::delete('/vehiculos', [VehiculosController::class, 'destroy']);
Route::post('/vehiculos/cambiarpropietario', [VehiculosController::class, 'updateCambioPropietario']);
*/