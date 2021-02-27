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

Route::get('/', [TaskController::class, 'list_tasks']);
Route::middleware(['ajax'])->group(function () {
    Route::post('/obtener-tareas', [TaskController::class, 'get'])->name('get');
    Route::put('/crear-tarea', [TaskController::class, 'store'])->name('store');
    Route::delete('/eliminar-tarea', [TaskController::class, 'delete'])->name('delete');
});
