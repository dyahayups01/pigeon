<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\PerformaController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');
    Route::get('/kepegawaian/approvalPegawai', [KepegawaianController::class, 'approvalPegawai'])->name('approvalPegawai');
    Route::post('/kepegawaian', [KepegawaianController::class, 'index'])->name('pegawai.index');
    Route::get('/kepegawaian', [KepegawaianController::class, 'index'])->name('pegawai.index');
    Route::get('kepegawaian/create', [KepegawaianController::class, 'create'])->name('tambahPegawai');
    Route::post('kepegawaian/store', [KepegawaianController::class, 'store'])->name('pegawai.store');
    Route::get('kepegawaian/store', [KepegawaianController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/edit/{id}', [KepegawaianController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/update/{id}', [KepegawaianController::class, 'update'])->name('pegawai.update'); 
    Route::post('kepegawaian/destroy', [KepegawaianController::class, 'destroy'])->name('pegawai.destroy'); 
    Route::get('/performa/lihat', [PerformaController::class, 'lihatData'])->name('performa.lihat');
    Route::get('/performa/tambahData', [PerformaController::class, 'tambahData'])->name('performa.tambahData');
    Route::post('/performa/storeData', [PerformaController::class, 'storeData'])->name('performa.storeData');
    Route::post('/performa/import', [PerformaController::class, 'importData'])->name('performa.import');
    Route::get('/performa/template', [PerformaController::class, 'downloadTemplate'])->name('performa.template');
    Route::get('/performa/approval', [PerformaController::class, 'approvalData'])->name('performa.approval');
    Route::post('/performa/approve', [PerformaController::class, 'approveData'])->name('performa.approve');
    Route::post('/performa/reject', [PerformaController::class, 'rejectData'])->name('performa.reject'); 
    Route::get('/performa/create', [PerformaController::class, 'create'])->name('performa.create');
   // Route::post('/performa/store', [PerformaController::class, 'store'])->name('performa.store');
   // Route::post('/performa/import', [PerformaController::class, 'import'])->name('performa.import');
    //Route::get('/performa/template', [PerformaController::class, 'template'])->name('performa.template');
    Route::get('/evaluasi/evaluasiPerforma', [EvaluasiController::class, 'evaluasiPerforma'])->name('evaluasi.evaluasiPerforma');
    Route::post('/evaluasi/hitungEvaluasi', [EvaluasiController::class, 'hitungEvaluasi'])->name('evaluasi.hitungEvaluasi');
    Route::get('/evaluasi/rekapitulasiPerforma', [EvaluasiController::class, 'rekapitulasiPerforma'])->name('evaluasi.rekapitulasiPerforma');
    Route::post('/evaluasi/tampilkanRekapitulasi', [EvaluasiController::class, 'tampilkanRekapitulasi'])->name('evaluasi.tampilkanRekapitulasi');
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
