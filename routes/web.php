<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Levelcontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Barangcontroller;
use App\Http\Controllers\Stokcontroller;
use App\Http\Controllers\Penjualancontroller;
use App\Http\Controllers\DetailpenjualanController;
use App\Http\Controllers\Welcomecontroller;


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
// Route::get('/', [Welcomecontroller::class, 'index']);
// Route::get('/level', [Levelcontroller::class, 'index']);
// Route::get('/kategori', [Kategoricontroller::class, 'index']);
// Route::get('/user', [Usercontroller::class, 'index']);
// Route::get('/user/tambah', [Usercontroller::class, 'tambah']);
// Route::post('/user/tambah_simpan', [Usercontroller::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [Usercontroller::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [Usercontroller::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [Usercontroller::class, 'hapus']);
// Route::post('/kategori', [Kategoricontroller::class, 'store']);
// Route::get('/kategori/create', [Kategoricontroller::class, 'create']);
// Route::get('/kategori/{id}/edit', [Kategoricontroller::class, 'edit']);
// Route::put('/kategori/{id}', [Kategoricontroller::class, 'update']);
// Route::delete('/kategori/{id}', [Kategoricontroller::class, 'destroy']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [Usercontroller::class, 'index']);
    Route::post('/list', [Usercontroller::class, 'list']);
    Route::get('/create', [Usercontroller::class, 'create']);
    Route::post('/', [Usercontroller::class, 'store']);
    Route::get('/{id}', [Usercontroller::class, 'show']);
    Route::get('/{id}/edit', [Usercontroller::class, 'edit']);
    Route::put('/{id}', [Usercontroller::class, 'update']);
    Route::delete('/{id}', [Usercontroller::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [Levelcontroller::class, 'index']);
    Route::post('/list', [Levelcontroller::class, 'list']);
    Route::get('/create', [Levelcontroller::class, 'create']);
    Route::post('/', [Levelcontroller::class, 'store']);
    Route::get('/{id}', [Levelcontroller::class, 'show']);
    Route::get('/{id}/edit', [Levelcontroller::class, 'edit']);
    Route::put('/{id}', [Levelcontroller::class, 'update']);
    Route::delete('/{id}', [Levelcontroller::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [Kategoricontroller::class, 'index']);
    Route::post('/list', [Kategoricontroller::class, 'list']);
    Route::get('/create', [Kategoricontroller::class, 'create']);
    Route::post('/', [Kategoricontroller::class, 'store']);
    Route::get('/{id}', [Kategoricontroller::class, 'show']);
    Route::get('/{id}/edit', [Kategoricontroller::class, 'edit']);
    Route::put('/{id}', [Kategoricontroller::class, 'update']);
    Route::delete('/{id}', [Kategoricontroller::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [Barangcontroller::class, 'index']);
    Route::post('/list', [Barangcontroller::class, 'list']);
    Route::get('/create', [Barangcontroller::class, 'create']);
    Route::post('/', [Barangcontroller::class, 'store']);
    Route::get('/{id}', [Barangcontroller::class, 'show']);
    Route::get('/{id}/edit', [Barangcontroller::class, 'edit']);
    Route::put('/{id}', [Barangcontroller::class, 'update']);
    Route::delete('/{id}', [Barangcontroller::class, 'destroy']);
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [Stokcontroller::class, 'index']);
    Route::post('/list', [Stokcontroller::class, 'list']);
    Route::get('/create', [Stokcontroller::class, 'create']);
    Route::post('/', [Stokcontroller::class, 'store']);
    Route::get('/{id}', [Stokcontroller::class, 'show']);
    Route::get('/{id}/edit', [Stokcontroller::class, 'edit']);
    Route::put('/{id}', [Stokcontroller::class, 'update']);
    Route::delete('/{id}', [Stokcontroller::class, 'destroy']);
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [Penjualancontroller::class, 'index']);
    Route::post('/list', [Penjualancontroller::class, 'list']);
    Route::get('/create', [Penjualancontroller::class, 'create']);
    Route::post('/', [Penjualancontroller::class, 'store']);
    Route::get('/{id}', [Penjualancontroller::class, 'show']);
    Route::get('/{id}/edit', [Penjualancontroller::class, 'edit']);
    Route::put('/{id}', [Penjualancontroller::class, 'update']);
    Route::delete('/{id}', [Penjualancontroller::class, 'destroy']);
});

Route::group(['prefix' => 'detailpenjualan'], function () {
    Route::get('/', [Detailpenjualancontroller::class, 'index']);
    Route::post('/list', [Detailpenjualancontroller::class, 'list']);
    Route::get('/create', [Detailpenjualancontroller::class, 'create']);
    Route::post('/', [Detailpenjualancontroller::class, 'store']);
    Route::get('/{id}', [Detailpenjualancontroller::class, 'show']);
    Route::get('/{id}/edit', [Detailpenjualancontroller::class, 'edit']);
    Route::put('/{id}', [Detailpenjualancontroller::class, 'update']);
    Route::delete('/{id}', [Detailpenjualancontroller::class, 'destroy']);
});