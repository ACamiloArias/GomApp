<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\OrdenController;

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

Route::get('/', function () {
    return view('auth.login');
});

    
/*
Route::get('/tecnico', function () {
    return view('tecnico.index');
});

Route::get('/tecnico/create', [TecnicoController::class,'create']);
*/

Route::resource('tecnico', TecnicoController::class)->middleware('auth');
Route::resource('repuesto', RepuestoController::class)->middleware('auth');
Route::resource('equipo', EquipoController::class)->middleware('auth');
Route::resource('orden', OrdenController::class)->middleware('auth');

Auth::routes();
Route::get('orden/pdf', [App\Http\Controllers\OrdenController::class, 'pdf'])->name('orden.pdf');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix(['middleware'=>'auth'],function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

Route::get('/orden/{id}/download', [OrdenController::class,'download'])->where('id', '[0-9]+');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
