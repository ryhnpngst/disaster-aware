<?php

use App\Http\Controllers\AdminLaporanController;
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
Route::get('/admin', function(){
    $totalLaporan = Report::count();
    $totalLaporanSelesai = Report::where('status', 'selesai diproses')->count();
    $totalPersenLaporanSelesai = $totalLaporanSelesai / $totalLaporan * 100;
    $totalPersenLaporanSelesai = number_format($totalPersenLaporanSelesai, 2);
    $totalLaporanDiProses = Report::where('status', 'sedang diproses')->count();
    $totalLaporanTertunda = Report::where('status', 'belum diproses')->count(); 

    return view('admin.index', [
        'totalLaporan' => $totalLaporan,
        'totalLaporanSelesai' => $totalLaporanSelesai,
        'totalLaporanDiProses' => $totalLaporanDiProses,
        'totalLaporanTertunda' => $totalLaporanTertunda,
        'totalPersenLaporanSelesai' => $totalPersenLaporanSelesai
    ]);
})-> name('admin.index');

Route::resource('/admin/laporan', \App\Http\Controllers\AdminLaporanController::class);
Route::post('/admin/laporan/{laporan}/validasi', [AdminLaporanController::class, 'validasi'])->name('laporan.validasi');
Route::post('/admin/laporan/{laporan}/selesai', [AdminLaporanController::class, 'selesai'])->name('laporan.selesai');

Route::resource('/admin/galeri', \App\Http\Controllers\AdminGaleriController::class);

Route::get('admin/artikel', function(){
    return view('admin.artikel.index');
})-> name('admin.artikel');
Route::get('/admin/akun', function(){
    return view('admin.akun');
})-> name('admin.akun');