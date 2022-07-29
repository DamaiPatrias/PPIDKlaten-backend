<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KeberatanInformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaklumatController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PpidPembantuController;
use App\Http\Controllers\SertaMertaController;
use App\Http\Controllers\SetiapSaatController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TeksBerandaController;
use App\Http\Controllers\TugasWewenangController;
use App\Http\Controllers\VisiMisiController;
use App\Models\PermohonanInformasi;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/user', AdminController::class)->middleware('auth');

Route::resource('/permohonan-informasi', PermohonanInformasiController::class)->names([
    'index' => 'login'
]);
Route::resource('/permohonan-informasi', PermohonanInformasiController::class)->only([
    'show'
])->middleware('auth');

Route::resource('/keberatan-informasi', KeberatanInformasiController::class);
Route::resource('/keberatan-informasi', KeberatanInformasiController::class)->only([
    'show'
])->middleware('auth');

Route::resource('/berkala', BerkalaController::class)->middleware('auth');

Route::resource('/serta-merta', SertaMertaController::class)->middleware('auth');

Route::resource('/setiap-saat', SetiapSaatController::class)->middleware('auth');

Route::resource('/carousel', CarouselController::class)->middleware('auth');

Route::resource('/teks-beranda', TeksBerandaController::class)->middleware('auth');

Route::resource('/visi-misi', VisiMisiController::class)->middleware('auth');

Route::resource('/tugas-wewenang', TugasWewenangController::class)->middleware('auth');

Route::resource('/struktur', StrukturController::class)->middleware('auth');

Route::resource('/maklumat', MaklumatController::class)->middleware('auth');

Route::resource('/dokumen', DokumenController::class)->middleware('auth');

Route::resource('/ppid-pembantu', PpidPembantuController::class)->middleware('auth');

Route::get('/admin', [LoginController::class, 'index'])->middleware('guest');
Route::post('/admin', [LoginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);
