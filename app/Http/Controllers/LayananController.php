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
}
