<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Se podría hacer con resource para ahorrarnos lineas
 * pero he preferido escribir una a una
 */
Route::get('/', [TaskController::class, 'list_tasks']);
Route::post('/obtener-tareas', [TaskController::class, 'get'])->name('get');
Route::put('/crear-tarea', [TaskController::class, 'store'])->name('store');
Route::delete('/eliminar-tarea', [TaskController::class, 'delete'])->name('delete');
