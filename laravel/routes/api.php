<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\ReformasiController;
use App\Http\Controllers\KunjunganController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-regulasi', [RegulasiController::class, 'getJsonRegulasi'])->name('get-regulasi');
Route::get('/get-informasi', [RegulasiController::class, 'getJsonInformasi'])->name('get-informasi');
Route::get('/get-rb', [ReformasiController::class, 'getJsonRB'])->name('get-rb');

Route::get('/get-kunjungan', [KunjunganController::class, 'get'])->name('get-kunjungan');
Route::post('/post-kunjungan', [KunjunganController::class, 'add'])->name('post-kunjungan');
