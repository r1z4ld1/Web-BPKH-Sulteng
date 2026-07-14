<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PegawaiController;

// resources/views/pages/home.blade.php
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

//link ke halaman tentang profil dimenu dripdown navbar
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
    Route::get('/tugas-fungsi', fn () => view('pages.home'))->name('tugas-fungsi');
    Route::get('/visi-misi', fn () => view('pages.home'))->name('visi-misi');
    Route::get('/struktur-organisasi', fn () => view('pages.home'))->name('struktur');
    Route::get('/motto', fn () => view('pages.home'))->name('motto');
    Route::get('/core-values', fn () => view('pages.home'))->name('core-values');
    Route::get('/zona-integritas', fn () => view('pages.home'))->name('zi');
    Route::get('/benturan-kepentingan', fn () => view('pages.home'))->name('benturan-kepentingan');
    Route::get('/tugas-fungsi', [ProfilController::class, 'tugasFungsi'])->name('tugas-fungsi');
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('struktur');
    Route::get('/motto', [ProfilController::class, 'motto'])->name('motto');
    Route::get('/core-values', [ProfilController::class, 'coreValues'])->name('core-values');
});

//link ke halaman layanan dimenu dripdown navbar
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/alur-pelayanan', [LayananController::class, 'alurPelayanan'])->name('alur');
    Route::get('/proses-ppkh', fn () => view('pages.home'))->name('ppkh');
    Route::get('/sipadu', fn () => view('pages.home'))->name('sipadu');
    Route::get('/survei-kepuasan', fn () => view('pages.home'))->name('survei');
    Route::get('/kebijakan-mutu', fn () => view('pages.home'))->name('kebijakan-mutu');
});

//link ke halaman berita dimenu dripdown navbar
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/{slug}', fn () => view('pages.home'))->name('show');
});

//link ke halaman publikasi dimenu dripdown navbar
Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/peraturan', fn () => view('pages.home'))->name('peraturan');
    Route::get('/penghargaan', fn () => view('pages.home'))->name('penghargaan');
    Route::get('/dokumentasi', fn () => view('pages.home'))->name('dokumentasi');
});

//link ke halaman kontak dimenu dripdown navbar
Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/whatsapp', fn () => view('pages.home'))->name('whatsapp');
    Route::get('/pengaduan', fn () => view('pages.home'))->name('pengaduan');
    Route::get('/ipk', fn () => view('pages.home'))->name('ipk');
    Route::get('/janji-temu', fn () => view('pages.home'))->name('janji-temu');
});

//link ke halaman peta interaktif dari halaman beranda
Route::get('/peta-interaktif', fn () => view('pages.home'))->name('layanan.peta');

//routes dashboard pegawai
Route::prefix('pegawai')->group(function () {

    Route::get(
        '/dashboard',
        [PegawaiController::class, 'dashboard']
    )
        ->name('pegawai.dashboard');

    // ROUTE PEGAWAI TARUH DISINI

    Route::prefix('pegawai')->group(function () {

        Route::get(
            '/dashboard',
            [PegawaiController::class, 'dashboard']
        )
            ->name('pegawai.dashboard');

    });


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
