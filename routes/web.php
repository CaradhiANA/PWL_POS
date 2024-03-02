<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Levelcontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Usercontroller;

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
