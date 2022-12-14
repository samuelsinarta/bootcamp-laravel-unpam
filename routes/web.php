<?php

use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Daftarproduk;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;


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
Route::get('/', [Homecontroller::class,'index'])->middleware('auth');
Route::get('profile', [Profilecontroller::class,'index'])->middleware('auth');
Route::get('kategoriproduk', [Kategoricontroller::class,'index'])->middleware('admin');
Route::get('addkategori', [Kategoricontroller::class,'databaru']);
Route::post('kategoriproduk', [Kategoricontroller::class,'savedatabaru']);
Route::get('editkategori/{id}', [Kategoricontroller::class,'editkategori']);
Route::patch('kategoriproduk', [Kategoricontroller::class,'saveeditkategori']);
Route::delete('kategoriproduk', [Kategoricontroller::class,'hapuskategori']);
Route::get('daftarproduk', [Daftarproduk::class,'index']);
Route::get('addproduk', [Daftarproduk::class,'databaru']);
Route::post('daftarproduk', [Daftarproduk::class,'savedatabaru']);
Route::get('editproduk/{id}', [Daftarproduk::class,'editproduk']);
Route::patch('daftarproduk', [Daftarproduk::class,'saveeditproduk']);
Route::delete('daftarproduk', [Daftarproduk::class,'hapusproduk']);
Route::get('daftarproduk/laporan', [Daftarproduk::class,'cetakpdf']);
Route::get('login', [Login::class,'index']);
Route::post('login', [Login::class,'signin']);
Route::get('login/logout', [Login::class,'logout']);