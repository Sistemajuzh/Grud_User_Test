<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InvitadoController;

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

Route::get('/', [InvitadoController::class, 'index']);



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/usuarios', [AdminController::class, 'Usuarios'])
//     ->middleware('auth.admin')
//     ->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', [AdminController::class, 'Usuarios'])
    ->middleware('auth.admin')
    ->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('welcome');
})->name('panel');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', [AdminController::class, 'Test'])
    ->middleware('auth.admin')
    ->name('test');

Route::get('/cliente', [ClienteController::class, 'index'])
    ->name('cliente');
