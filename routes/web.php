<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\RiwayatKonsultasiController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::resource('gejala', GejalaController::class);
    Route::resource('riwayat_konsultasi', RiwayatKonsultasiController::class);
    Route::resource('rules', RulesController::class);
    Route::resource('konsultasi', KonsultasiController::class);
    Route::resource('penyakit', PenyakitController::class);
});
