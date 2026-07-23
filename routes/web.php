<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\pegawai\PegawaiController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PetaController;

// resources/views/pages/home.blade.php
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

//link ke halaman tentang profil dimenu dropdown navbar
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
    Route::get('/tugas-fungsi', [ProfilController::class, 'tugasFungsi'])->name('tugas-fungsi');
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('struktur');
    Route::get('/motto', [ProfilController::class, 'motto'])->name('motto');
    Route::get('/core-values', [ProfilController::class, 'coreValues'])->name('core-values');
});

//link ke halaman layanan dimenu dropdown navbar
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/alur-pelayanan', [LayananController::class, 'alurPelayanan'])->name('alur');
    Route::get('/proses-ppkh', [LayananController::class, 'ppkh'])->name('ppkh');
    Route::get('/pelayanan-terpadu', [LayananController::class, 'pelayananTerpadu'])->name('pelayanan-terpadu');
    Route::get('/survei-kepuasan', [LayananController::class, 'survei'])->name('survei');
    Route::get('/kebijakan-mutu', [LayananController::class, 'kebijakanMutu'])->name('kebijakan-mutu');

});

//link ke halaman berita dimenu dropdown navbar
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', fn () => view('pages.home'))->name('index');
    Route::get('/{slug}', fn () => view('pages.home'))->name('show');
});

//link ke halaman publikasi dimenu dropdown navbar
Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/peraturan', [PublikasiController::class, 'peraturan'])->name('peraturan');
    Route::get('/penghargaan', [PublikasiController::class, 'penghargaan'])->name('penghargaan');
    Route::get('/dokumentasi', [PublikasiController::class, 'dokumentasi'])->name('dokumentasi');
});

//link ke halaman kontak Hubungi Kami dimenu dropdown navbar
Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/lentera-bpkh-16', [KontakController::class, 'lentera'])->name('lentera');
    Route::get('/survei-anti-korupsi', [KontakController::class, 'surveiAntiKorupsi'])->name('survei-anti-korupsi');
    Route::get('/pengaduan-masyarakat', [KontakController::class, 'pengaduan'])->name('pengaduan');
});

//link ke halaman berita
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('show');
});

//link ke halaman peta interaktif dari halaman beranda
Route::get('/peta-interaktif', fn () => view('pages.home'))->name('layanan.peta');

//link ke halaman peta interaktif dari halaman beranda
Route::get('/peta-kawasan-hutan', [PetaController::class, 'index'])->name('peta.index');

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
