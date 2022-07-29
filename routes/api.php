<?php

use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\MaklumatController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PostKeberatanInformasiController;
use App\Http\Controllers\PostPermohonanInformasiController;
use App\Http\Controllers\PpidPembantuController;
use App\Http\Controllers\SertaMertaController;
use App\Http\Controllers\SetiapSaatController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TeksBerandaController;
use App\Http\Controllers\TugasWewenangController;
use App\Http\Controllers\VisiMisiController;
use App\Models\Dokumen;
use App\Models\SetiapSaat;
use App\Models\Struktur;
use App\Models\TeksBeranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/permohonan-informasi-input', [PostPermohonanInformasiController::class, 'postPermohonan']);

Route::post('/keberatan-informasi-input', [PostKeberatanInformasiController::class, 'postKeberatan']);

Route::get('/berkala', [BerkalaController::class, 'getApiBerkala']);

Route::get('/serta-merta', [SertaMertaController::class, 'getApiSertaMerta']);

Route::get('/setiap-saat', [SetiapSaatController::class, 'getApiSetiapSaat']);

Route::get('/carousel', [CarouselController::class, 'getApiCarousel']);

Route::get('/teks-beranda', [TeksBerandaController::class, 'getApiTeksBeranda']);

Route::get('/visi-misi', [VisiMisiController::class, 'getApiVisiMisi']);

Route::get('/tugas-wewenang', [TugasWewenangController::class, 'getApiTugasWewenang']);

Route::get('/struktur', [StrukturController::class, 'getApiStruktur']);

Route::get('/maklumat', [MaklumatController::class, 'getApiMaklumat']);

Route::get('/dokumen', [DokumenController::class, 'getApiDokumen']);

Route::get('/ppid-pembantu', [PpidPembantuController::class, 'getApiPpidPembantu']);
