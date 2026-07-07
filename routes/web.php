<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// resources/views/pages/home.blade.php
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/sejarah', fn () => view('pages.home'))->name('sejarah');
    Route::get('/tugas-fungsi', fn () => view('pages.home'))->name('tugas-fungsi');
    Route::get('/visi-misi', fn () => view('pages.home'))->name('visi-misi');
    Route::get('/struktur-organisasi', fn () => view('pages.home'))->name('struktur');
    Route::get('/motto', fn () => view('pages.home'))->name('motto');
    Route::get('/core-values', fn () => view('pages.home'))->name('core-values');
    Route::get('/zona-integritas', fn () => view('pages.home'))->name('zi');
    Route::get('/benturan-kepentingan', fn () => view('pages.home'))->name('benturan-kepentingan');
});

Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/peta-interaktif', fn () => view('pages.home'))->name('peta');
    Route::get('/konsultasi', fn () => view('pages.home'))->name('konsultasi');
    Route::get('/survei-kepuasan', fn () => view('pages.home'))->name('survei');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/{slug}', fn () => view('pages.home'))->name('show');
});

Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/peraturan', fn () => view('pages.home'))->name('peraturan');
    Route::get('/penghargaan', fn () => view('pages.home'))->name('penghargaan');
});

Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/formulir', fn () => view('pages.home'))->name('formulir');
    Route::get('/pengaduan', fn () => view('pages.home'))->name('pengaduan');
    Route::get('/wbs', fn () => view('pages.home'))->name('wbs');
    Route::get('/janji-temu', fn () => view('pages.home'))->name('janji-temu');
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
