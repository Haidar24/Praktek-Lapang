<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\klController;
use App\Http\Controllers\skController;
use App\Http\Controllers\smController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\sifatsmController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\disposisiController;
use App\Http\Controllers\laporanskController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\pesanController;

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

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('vw_sk', function () {
//     return view('vw_sk');
// });

// Route::get('/', [homeController::class, 'index'])->name('home');

// Route::get('vw_sm', [smController::class, 'index'])->name('vw_sm');
Route::get('/vw_p_tambah', function () {
    return view('admin.vw_p_tambah');
})->name('vw_p_tambah');

Auth::routes();

    Route::middleware(['auth'])->group(function() {
    Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource ('home', DashboardPetugasController::class);

    Route::middleware(['admin'])->group(function(){
       
        Route::resource ('vw_sm', smController::class);
        Route::resource('vw_sk',skController::class);
        Route::resource('vw_laporan', laporanController::class);
        Route::resource('vw_pengguna', penggunaController::class);
        Route::resource('vw_klasifikasi', klController::class);
        Route::resource('vw_sifatsurat', sifatsmController::class);
        Route::resource('vw_jabatan', jabatanController::class);
        Route::resource('vw_laporan_sk', laporanskController::class);
        Route::resource('vw_disposisi', disposisiController::class);
        Route::get('/cetak/{tglawal}/{tglakhir}',[LaporanController::class,'cklaporan'])->name('cetak');
        Route::get('/baca-pdf/{id}', [smController::class, 'bacaPDF'])->name('baca-pdf');
        
    });
    Route::middleware(['user'])->group(function() {
        Route::resource ('vw_pesan', pesanController::class);
    });


});

