<?php

use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Models\Report;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login-process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-process', [LoginController::class, 'registerProcess'])->name('register-process');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
    Route::get('/dashboard', function(){
        $totalLaporan = Report::count();
        $totalLaporanSelesai = Report::where('status', 'selesai diproses')->count();
        if ($totalLaporan == 0) {
            $totalPersenLaporanSelesai = 0;
        } else {
            $totalPersenLaporanSelesai = $totalLaporanSelesai / $totalLaporan * 100;
            $totalPersenLaporanSelesai = number_format($totalPersenLaporanSelesai, 2);
        }
        $totalLaporanDiProses = Report::where('status', 'sedang diproses')->count();
        $totalLaporanTertunda = Report::where('status', 'belum diproses')->count(); 
    
        return view('admin.index', [
            'totalLaporan' => $totalLaporan,
            'totalLaporanSelesai' => $totalLaporanSelesai,
            'totalLaporanDiProses' => $totalLaporanDiProses,
            'totalLaporanTertunda' => $totalLaporanTertunda,
            'totalPersenLaporanSelesai' => $totalPersenLaporanSelesai
        ]);
    })->name('admin.dashboard');
    
    Route::resource('/laporan', \App\Http\Controllers\AdminLaporanController::class);
    Route::post('/laporan/{laporan}/validasi', [AdminLaporanController::class, 'validasi'])->name('laporan.validasi');
    Route::post('/laporan/{laporan}/selesai', [AdminLaporanController::class, 'selesai'])->name('laporan.selesai');
    
    Route::resource('/galeri', \App\Http\Controllers\AdminGaleriController::class);
    
    Route::resource('/artikel', \App\Http\Controllers\AdminArtikelController::class);
    
    Route::resource('/akun', \App\Http\Controllers\AdminAkunController::class);
});

Route::resource('/edukasi', \App\Http\Controllers\EducationController::class);

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

Route::resource('/', \App\Http\Controllers\HomeController::class);