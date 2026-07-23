<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LayananController extends Controller
{
   public function alurPelayanan(): View
{
    $langkah = [
        [
            'aktor' => 'Pemohon',
            'icon' => 'document',
            'judul' => 'Pemohon',
            'deskripsi' => 'Menyampaikan surat permohonan kepada Balai.',
            'kanal' => ['POS', 'Email: bpkhxvi@gmail.com', 'Form SIPADU-16'],
        ],
        [
            'aktor' => 'Staf Pelayanan',
            'icon' => 'check',
            'judul' => 'Staf Pelayanan',
            'deskripsi' => 'Melakukan verifikasi kelengkapan berkas permohonan. Permohonan yang tidak lengkap dikembalikan kepada pemohon untuk melengkapi syarat permohonan.',
            'kanal' => [],
        ],
        [
            'aktor' => 'Staf Pelayanan',
            'icon' => 'clock',
            'judul' => 'Proses',
            'deskripsi' => 'Penyelesaian tanggapan 5 (lima) hari kerja, atau sesuai standar operasional prosedur tiap layanan.',
            'kanal' => [],
        ],
        [
            'aktor' => 'Staf Pelayanan',
            'icon' => 'send',
            'judul' => 'Penyerahan Hasil',
            'deskripsi' => 'Penyampaian surat balasan data/informasi/hasil kepada pemohon.',
            'kanal' => ['POS', 'Email Pemohon'],
        ],
        [
            'aktor' => 'Pemohon',
            'icon' => 'star',
            'judul' => 'Survei',
            'deskripsi' => 'Pemohon mengisi survei Kepuasan Masyarakat dan Persepsi Anti Korupsi.',
            'kanal' => [],
        ],
    ];

    return view('pages.layanan.alur-pelayanan', compact('langkah'));
}

public function ppkh(): View
{
    $syaratAdministrasi = [
        'Pernyataan Komitmen',
        'Pakta Integritas',
        'Profil Badan Usaha (NPWP, KTP, dan Akta Pendirian)',
    ];

    $syaratTeknis = [
        'Peta permohonan skala paling kecil 1:50.000 atau lebih besar, ditandatangani pemohon dan disahkan.',
        'Peta citra penginderaan jauh resolusi kecil 5 m dengan mencantumkan koordinat lokasi permohonan, paling lama 1 tahun terakhir, dilengkapi softcopy format ECW dengan koordinat Sistem UTM Datum WGS 84.',
        'Rekomendasi Gubernur tentang Penggunaan Kawasan Hutan dari Balai Pemantapan Kawasan Hutan dan Pertimbangan Teknis Dinas Kehutanan Provinsi.',
        'Perizinan/perjanjian atau perizinan berusaha yang berlaku efektif, bersifat clear and clean, dan berlaku paling singkat 5 bulan dari tanggal pengajuan permohonan.',
        'Untuk permohonan yang belum memiliki perizinan ketenagalistrikan/perhubungan, wajib melampirkan KA ANDAL; yang tidak wajib AMDAL melampirkan UKL-UPL.',
        'Permohonan PPKH untuk berusaha yang belum memiliki perizinan berusaha, dilengkapi keputusan/penetapan pemenang lelang wilayah pertambangan (khusus kegiatan pertambangan).',
    ];

    $rapatKonfirmasi = [
        'Kesesuaian luasan kawasan hutan',
        'Penggunaan dan penatagunaan kawasan hutan',
        'Penyelesaian hutan',
        'Pemanfaatan hutan',
        'Kuasa',
        'Penggunaan kawasan hutan',
        'Penutupan lahan',
    ];

    return view('pages.layanan.ppkh', compact('syaratAdministrasi', 'syaratTeknis', 'rapatKonfirmasi'));
}

public function pelayananTerpadu(): View
{
    $googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSfMAZvVjSi-FSbvABYKMhND8K1r-4UZVEeAYCMiPqVIJQCNnQ/viewform?embedded=true';
    $googleFormUrlOriginal = 'https://docs.google.com/forms/d/e/1FAIpQLSfMAZvVjSi-FSbvABYKMhND8K1r-4UZVEeAYCMiPqVIJQCNnQ/viewform';

    return view('pages.layanan.pelayanan-terpadu', compact('googleFormUrl', 'googleFormUrlOriginal'));
}

public function survei(): View
{
    $googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSeB4k4z4ZRxFF1hr_y8VCONASIhwWMqfPhPkRCS3mBhdQIh3Q/viewform?embedded=true';
    $googleFormUrlOriginal = 'https://docs.google.com/forms/d/e/1FAIpQLSeB4k4z4ZRxFF1hr_y8VCONASIhwWMqfPhPkRCS3mBhdQIh3Q/viewform';

    return view('pages.layanan.survei', compact('googleFormUrl', 'googleFormUrlOriginal'));
}

public function kebijakanMutu(): View
{
    $poin = [
        'Melakukan pengukuhan kawasan hutan, penyiapan bahan perencanaan kehutanan wilayah, penyiapan data perubahan fungsi dan peruntukan kawasan hutan, serta pengelolaan data dan informasi sumber daya hutan secara efektif dan efisien.',
        'Melaksanakan verifikasi dan validasi kegiatan dan memastikan telah sesuai dengan standar layanan yang ditetapkan.',
        'Senantiasa meningkatkan kualitas Sumber Daya Manusia (SDM), pengelolaan aset, dan teknologi yang relevan untuk memperbaiki efektivitas Sistem Manajemen Mutu.',
        'Berorientasi kepada peningkatan kinerja yang berkelanjutan untuk menjamin kepuasan pelanggan.',
        'Senantiasa mematuhi peraturan perundang-undangan yang berlaku.',
    ];

    $pengesahan = [
        'tempat_tanggal' => 'Palu, 17 April 2025',
        'jabatan' => 'Kepala Balai',
        'nama' => 'Victor W. Rante Lembang, S.Hut., M.Si',
        'nip' => '19750419 200112 1 002',
    ];

    return view('pages.layanan.kebijakan-mutu', compact('poin', 'pengesahan'));
}
}
