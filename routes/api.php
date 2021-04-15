<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Empleado\EmpleadoController;
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Venta\VentasController;
use App\Http\Controllers\Precios\PrecioEspecialController;
use App\Http\Controllers\Rols\RolsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
	Prpoductos
**/
Route::get('getAllProductos',[ProductoController::class, 'getAll']);
Route::post('saveProducto', [ProductoController::class, 'saveUpdateProducto']);

/**
	Empleados
**/
Route::get('getAllEmpleados', [EmpleadoController::class, 'getAll']);
Route::post('saveEmpleado', [EmpleadoController::class, 'saveUpdateEmpleado']);

/**
	Clientes
**/
Route::get('getAllClientes', [ClienteController::class, 'getAll']);
Route::post('saveCliente', [ClienteController::class, 'saveUpdateCliente']);

/**
	Ventas
**/
Route::post('saveSale', [VentasController::class, 'saveSale']);

/**
	Precios
**/
Route::post('savePrice', [PrecioEspecialController::class, 'savePrice']);
Route::get('getAllPrices', [PrecioEspecialController::class, 'getAll']);

/**
	Roles
**/
Route::post('saveRol', [RolsController::class, 'saveRol']);
Route::get('getAllRols', [RolsController::class, 'getAll']);