<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\ReformasiController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\KlikLayananController;
use App\Http\Controllers\KlikBantuanController;
use App\Http\Controllers\KlikDataController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\MimbarController;
use App\Http\Controllers\FiledataController;

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
Route::get('/get-monthly-counts', [KunjunganController::class, 'getMonthlyCounts'])->name('getMonthlyCounts');


Route::post('/post-klik-layanan', [KlikLayananController::class, 'add'])->name('post-klik-layanan');
Route::post('/post-klik-bantuan', [KlikBantuanController::class, 'add'])->name('post-klik-bantuan');
Route::post('/post-klik-data', [KlikDataController::class, 'add'])->name('post-klik-data');

Route::post('/post-feedback', [FeedbackController::class, 'add'])->name('post-kunjungan');

Route::put('/update-status-informasi/{id}', [InformasiController::class, 'updateStatusInformasi']);
Route::put('/update-status-renungan/{id}', [RenunganController::class, 'updateStatusRenungan']);
Route::put('/update-status-mimbar/{id}', [MimbarController::class, 'updateStatusMimbar']);

Route::get('data-file/{id}', [FiledataController::class, 'get']);
