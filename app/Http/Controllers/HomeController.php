<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $statistik = [
            ['icon' => 'ruler', 'nilai' => '540 km', 'label' => 'Panjang batas kawasan hutan'],
            ['icon' => 'map', 'nilai' => '3,7 juta ha', 'label' => 'Luas kawasan hutan tertata'],
            ['icon' => 'pin', 'nilai' => '1.240', 'label' => 'Pal batas terpasang'],
            ['icon' => 'building', 'nilai' => '12', 'label' => 'Kabupaten/kota wilayah kerja'],
        ];
$layanan = [
    ['icon' => 'clipboard', 'judul' => 'Layanan', 'deskripsi' => 'Permohonan data dan layanan teknis kawasan hutan.', 'route' => 'layanan.index'],
    ['icon' => 'file', 'judul' => 'Publikasi & Peraturan', 'deskripsi' => 'Dokumen resmi, regulasi, dan hasil kajian.', 'route' => 'publikasi.peraturan'],
    ['icon' => 'news', 'judul' => 'Berita', 'deskripsi' => 'Kabar dan kegiatan terbaru dari kantor.', 'route' => 'berita.index'],
    ['icon' => 'message', 'judul' => 'Pengaduan', 'deskripsi' => 'Sampaikan masukan atau laporan kepada kami.', 'route' => 'kontak.pengaduan'],
];

        $berita = [
            ['judul' => 'Penataan batas kawasan hutan Kabupaten Sigi rampung', 'tanggal' => '2 Juli 2026', 'kategori' => 'Kegiatan'],
            ['judul' => 'Koordinasi lintas instansi soal tata batas kawasan', 'tanggal' => '28 Juni 2026', 'kategori' => 'Koordinasi'],
            ['judul' => 'Pelatihan pemetaan kawasan hutan bagi staf lapangan', 'tanggal' => '20 Juni 2026', 'kategori' => 'Pelatihan'],
        ];

        return view('pages.home', compact('statistik', 'layanan', 'berita'));
    }
}
