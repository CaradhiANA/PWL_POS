<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Levelcontroller;
use App\Http\Controllers\Kategoricontroller;


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

Route::get('/home', function () {
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

Route::post('/kategori', [Kategoricontroller::class, 'store']);
Route::get('/kategori/create', [Kategoricontroller::class, 'create']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);