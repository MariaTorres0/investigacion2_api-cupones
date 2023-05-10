<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AdministradorController;

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

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('getCuponById/{id}', [CuponController::class, 'getCuponById']);
    Route::put('actualizar-cupon/{id}', [CuponController::class, 'updateCupon']);

    //CLIENTE
    Route::get('getClienteById/{id}', [ClientesController::class, 'getClienteById']); //Obtener un cliente por ID

    Route::get('getClienteByIdPer/{id}', [ClientesController::class, 'getClienteByIdPer']); //Obtener un cliente por ID y retornar Nombre,
    //Apellido y DUI

    Route::get('getClientes', [ClientesController::class, 'getClientes']); //Obtener todos los clientes

    Route::post('saveCliente', [ClientesController::class, 'saveCliente']); //Agregar un cliente

    Route::patch('updateById', [ClientesController::class, 'updateById']); //editar un cliente por ID

    Route::delete('deleteById/{id}', [ClientesController::class, 'deleteById']); //eliminar un cliente por id

    //EMPLEADO
    Route::get('getEmpleadoById/{id}', [EmpleadosController::class, 'getEmpleadoById']); //Obtener un empleado por ID

    Route::get('getEmpleados', [EmpleadosController::class, 'getEmpleados']); //Obtener todos los empleados

    Route::post('saveEmpleado', [EmpleadosController::class, 'saveEmpleado']); //Agregar un empleado

    Route::patch('updateEmpleadoById', [EmpleadosController::class, 'updateEmpleadoById']); //editar un empleado por ID

    Route::delete('deleteEmpleadoById/{id}', [EmpleadosController::class, 'deleteEmpleadoById']); //eliminar un empleado por id*/

    //AMINISTRADOR
    Route::get('getAdministradorById/{id}', [AdministradorController::class, 'getAdministradorById']); //Obtener un administrador por ID

    Route::get('getAdministradores', [AdministradorController::class, 'getAdministradores']); //Obtener todos los administradores

    Route::post('saveAdministrador', [AdministradorController::class, 'saveAdministrador']); //Agregar un administrador

    Route::patch('updateAdministradorById', [AdministradorController::class, 'updateAdministradorById']); //editar un administrador por ID

    Route::delete('deleteAdministradorById/{id}', [AdministradorController::class, 'deleteAdministradorById']); //eliminar un administrador por id*/
});
