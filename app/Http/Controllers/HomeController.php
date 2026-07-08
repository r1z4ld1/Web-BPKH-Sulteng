<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $statistikCards = [
    ['icon' => 'ruler', 'nilai' => '540 km', 'label' => 'Panjang batas kawasan hutan'],
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


     $layananUnggulan = [
        [
            'nomor' => '01',
            'warna' => 'primary',
            'icon'  => 'mountain',
            'judul' => 'Analisis Status dan Fungsi Kawasan Hutan',
            'deskripsi' => 'Kajian status dan fungsi kawasan hutan berdasarkan data spasial resmi.',
        ],
        [
            'nomor' => '02',
            'warna' => 'secondary',
            'icon'  => 'eye',
            'judul' => 'Data Informasi Geospasial',
            'deskripsi' => 'Penyediaan data dan peta kawasan hutan wilayah kerja Sulawesi Tengah.',
        ],
        [
            'nomor' => '03',
            'warna' => 'highlight',
            'icon'  => 'shield',
            'judul' => 'Supervisi Kawasan Hutan',
            'deskripsi' => 'Pengawasan dan pendampingan teknis terkait pengelolaan kawasan hutan.',
        ],
        [
            'nomor' => '04',
            'warna' => 'action',
            'icon'  => 'map',
            'judul' => 'Survey Hutan Alam Primer (PIPPIB)',
            'deskripsi' => 'Survei lapangan untuk identifikasi hutan alam primer dan lahan gambut.',
        ],
        [
            'nomor' => '05',
            'warna' => 'primary',
            'icon'  => 'clipboard-check',
            'judul' => 'Klarifikasi Status Kawasan Hutan',
            'deskripsi' => 'Layanan klarifikasi status dan batas kawasan hutan atas permohonan masyarakat.',
        ],
        [
            'nomor' => '06',
            'warna' => 'secondary',
            'icon'  => 'file-check',
            'judul' => 'Verifikasi PNBP-PKH Self Assessment (Mandiri)',
            'deskripsi' => 'Verifikasi mandiri penerimaan negara bukan pajak penggunaan kawasan hutan.',
        ],
    ];

     $kawasanHutan = [
        'total_ha' => '3.750.000',
        'dasar_hukum' => 'SK Menteri LHK (data ilustratif, akan digantikan data resmi)',
        'rincian' => [
            ['label' => 'Kawasan Suaka Alam / Pelestarian Alam (KSA/KPA)', 'ha' => '450.000', 'persen' => 12, 'warna' => 'highlight'],
            ['label' => 'Hutan Lindung (HL)', 'ha' => '900.000', 'persen' => 24, 'warna' => 'primary'],
            ['label' => 'Hutan Produksi Terbatas (HPT)', 'ha' => '800.000', 'persen' => 21, 'warna' => 'secondary'],
            ['label' => 'Hutan Produksi (HP)', 'ha' => '1.100.000', 'persen' => 29, 'warna' => 'action'],
            ['label' => 'Hutan Produksi Konversi (HPK)', 'ha' => '500.000', 'persen' => 14, 'warna' => 'highlight'],
        ],
    ];

    return view('pages.home', compact('statistikCards', 'kawasanHutan', 'layanan', 'berita', 'layananUnggulan'));
    }
}
