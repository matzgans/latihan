<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporController;

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
    return view('welcome');
});

Route::get('/pelapor', [PelaporController::class, 'index'])->name('pelapor');

Route::get('/tambah', [PelaporController::class, 'tambah']);
Route::post('/insertdata', [PelaporController::class, 'insertdata']);
Route::get('/tampildata/{id}', [PelaporController::class, 'tampildata'])->name('tampildata');
Route::post('/editdata/{id}', [PelaporController::class, 'editdata'])->name('editdata');
Route::get('/hapusdata/{id}', [PelaporController::class, 'hapusdata']);
Route::get('/exportpdf', [PelaporController::class, 'exportpdf']);