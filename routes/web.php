<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Levelcontroller;
use App\Http\Controllers\Barangcontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Penjualancontroller;
use App\Http\Controllers\PenjualanDetailcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [Levelcontroller::class, 'index']);

Route::get('/kategori', [Kategoricontroller::class, 'index']);

Route::get('/user', [Usercontroller::class, 'index']);
Route::get('/user/tambah', [Usercontroller::class, 'tambah']);
Route::post('/user/tambah_simpan', [Usercontroller::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [Usercontroller::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [Usercontroller::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [Usercontroller::class, 'hapus']);
