<?php

use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Homecontroller;
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

Route::get('/', [Homecontroller::class,'index']);
Route::get('profile', [Profilecontroller::class,'index']);
Route::get('kategoriproduk', [Kategoricontroller::class,'index']);
Route::get('addkategori', [Kategoricontroller::class,'databaru']);
Route::post('kategoriproduk', [Kategoricontroller::class,'savedatabaru']);