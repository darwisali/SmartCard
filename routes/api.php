<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SantriController,AdminController,TabunganController,TransaksiController,SyahriyahController,RekapSyahriyahController,RekapRegistrasiController,RegistrasiController,SantriBaruController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('santri', SantriController::class);
Route::resource('/', AdminController::class);
Route::resource('tabungan', TabunganController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('syahriyah', SyahriyahController::class);
Route::resource('rekapsyahriyah', RekapSyahriyahController::class);
Route::resource('rekapregistrasi', RekapRegistrasiController::class);
Route::resource('registrasi', RegistrasiController::class);
Route::resource('santribaru', SantriBaruController::class);
Route::post('cards', [App\Http\Controllers\CardController::class, 'store']);
