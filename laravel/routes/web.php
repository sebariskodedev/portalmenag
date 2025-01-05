<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\MimbarController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\ReformasiController;
use App\Http\Controllers\UkerController;
use App\Http\Controllers\StandardPelayananController;
use App\Http\Controllers\DumasController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\BantuanInformasiController;
use App\Http\Controllers\KategoriRBController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//route barang
Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/pelayanan/maklumat', LayananController::class)->middleware('auth');
Route::resource('/pelayanan/uker', UkerController::class)->middleware('auth');
Route::resource('/pelayanan/standard', StandardPelayananController::class)->middleware('auth');


Route::resource('/admin/bantuan-informasi', BantuanInformasiController::class)->middleware('auth');
Route::resource('/admin/bantuan-tersalurkan', BantuanController::class)->middleware('auth');

Route::resource('/admin/infografis', InfografisController::class)->middleware('auth');
Route::resource('/dumas/subjek', DumasController::class)->middleware('auth');
Route::resource('/admin/struktur', StrukturController::class)->middleware('auth');
Route::get('/dumas/aduan', [DumasController::class, 'aduan'])->middleware('auth');


Route::resource('/informasi/berita', InformasiController::class)->middleware('auth');
Route::resource('/informasi/renungan', RenunganController::class)->middleware('auth');
Route::resource('/informasi/mimbar', MimbarController::class)->middleware('auth');

Route::resource('/rb/kategori', KategoriRBController::class)->middleware('auth');
Route::resource('/rb/data', ReformasiController::class)->middleware('auth');

Route::resource('admin/informasi-regulasi', RegulasiController::class)->middleware('auth');







// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/news/{id}', [NewsController::class, 'index'])->name('news');
Route::get('/list-maklumat-pelayanan', [LayananController::class, 'getMaklumatPelayanan'])->name('maklumat-pelayanan');
Route::get('/detail-maklumat', function () {
    abort(404);
})->name('detail-maklumat');
Route::get('/standard-pelayanan', [LayananController::class, 'getStandardPelayanan'])->name('standard-pelayanan');


Route::get('/berita-terbaru', [InformasiController::class, 'getInformasiTerbaru'])->name('berita-terbaru');
Route::get('/renungan-terbaru', [RenunganController::class, 'getRenunganTerbaru'])->name('renungan-terbaru');
Route::get('/mimbar-terbaru', [MimbarController::class, 'getMimbarTerbaru'])->name('mimbar-terbaru');

Route::get('/list-bantuan-informasi', [BantuanController::class, 'getInformasiBantuan'])->name('data-bantuan-informasi');
Route::get('/bantuan-informasi-action/{id}', [BantuanController::class, 'getInformasiBantuanAction'])->name('bantuan-informasi-action');
Route::get('/list-bantuan-tersalurkan', [BantuanController::class, 'getBantuanTersalurkan'])->name('data-bantuan-tersalurkan');
Route::get('/bantuan-tersalurkan-action/{id}', [BantuanController::class, 'getBantuanTersalurkanAction'])->name('bantuan-tersalurkan-action');

Route::get('/article/{kategori}/{id}', [InformasiController::class, 'getInformasi'])->name('article-page');


Route::get('/list-infografis', [InfografisController::class, 'getInfografis'])->name('infografis');

Route::get('/dumas', [DumasController::class, 'show_page'])->name('dumas');
Route::post('/dumas', [DumasController::class, 'submit'])->name('dumas.submit');

Route::get('/informasi-regulasi', [RegulasiController::class, 'showInformasiRegulasi'])->name('informasi-regulasi');
Route::get('/informasi-regulasi-action/{kategori}/{id}', [RegulasiController::class, 'getInfoRegulasi'])->name('informasi-regulasi-action');

Route::get('/reformasi-birokrasi', [KategoriRBController::class, 'getKategori'])->name('reformasi-birokrasi');
Route::get('/reformasi-birokrasi/action/{id}', [ReformasiController::class, 'action'])->name('reformasi-birokrasi-action');
Route::get('/reformasi-birokrasi/action/child/{id}', [ReformasiController::class, 'actionChild'])->name('reformasi-birokrasi-action-child');


Route::get('/struktur-organisasi/{id}', [StrukturController::class, 'getStruktur'])->name('struktur-organisasi');


Route::get('/search', [SearchController::class, 'search'])->name('search');