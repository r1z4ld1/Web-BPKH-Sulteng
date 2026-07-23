<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PublikasiController extends Controller
{
    public function peraturan(): View
    {
        $kategori = ['Semua', 'Undang-Undang', 'Peraturan Pemerintah', 'Peraturan Menteri', 'Peraturan Direktur Jenderal'];

        $peraturan = [
            [
                'judul' => 'Peraturan Menteri Kehutanan Nomor 3 Tahun 2025 tentang Organisasi dan Tata Kerja Balai Pemantapan Kawasan Hutan',
                'nomor' => 'Permenhut No. 3 Tahun 2025',
                'kategori' => 'Peraturan Menteri',
                'tanggal' => '2025',
                'file' => 'permen-3-2025-organisasi-tata-kerja-bpkh.pdf',
            ],
            [
                'judul' => 'Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 7 Tahun 2021 tentang Persetujuan Penggunaan Kawasan Hutan',
                'nomor' => 'Permen LHK No. 7 Tahun 2021',
                'kategori' => 'Peraturan Menteri',
                'tanggal' => '2021',
                'file' => 'permen-lhk-7-2021-ppkh.pdf',
            ],
            [
                'judul' => 'Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara',
                'nomor' => 'UU No. 5 Tahun 2014',
                'kategori' => 'Undang-Undang',
                'tanggal' => '2014',
                'file' => 'uu-5-2014-asn.pdf',
            ],
        ];

        return view('pages.publikasi.peraturan', compact('kategori', 'peraturan'));
    }

public function penghargaan(): View
{
    $penghargaan = [
        [
            'judul' => 'Sertifikat ISO 9001:2015 Sistem Manajemen Mutu',
            'deskripsi' => 'Penghargaan atas penerapan Sistem Manajemen Mutu sesuai standar internasional ISO 9001:2015 dalam pelayanan publik.',
            'tahun' => '2024',
            'file' => 'sertifikat-01.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Sertifikat ISO 37001:2016 Sistem Manajemen Anti Penyuapan',
            'deskripsi' => 'Pengakuan atas komitmen pencegahan praktik penyuapan dalam tata kelola organisasi.',
            'tahun' => '2024',
            'file' => 'sertifikat-02.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Penghargaan Zona Integritas Menuju WBK',
            'deskripsi' => 'Diberikan atas capaian pembangunan Zona Integritas menuju Wilayah Bebas dari Korupsi.',
            'tahun' => '2023',
            'file' => 'sertifikat-potrait-01.jpg',
            'orientasi' => 'portrait',
        ],
        [
            'judul' => 'Piagam Penghargaan Pelayanan Publik Terbaik',
            'deskripsi' => 'Apresiasi atas kualitas pelayanan publik yang responsif dan akuntabel kepada masyarakat.',
            'tahun' => '2023',
            'file' => 'sertifikat-03.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Sertifikat Akreditasi Laboratorium Pengukuran',
            'deskripsi' => 'Pengakuan kompetensi teknis dalam pelaksanaan pengukuran dan pemetaan kawasan hutan.',
            'tahun' => '2022',
            'file' => 'sertifikat-04.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Penghargaan Keterbukaan Informasi Publik',
            'deskripsi' => 'Diberikan atas komitmen transparansi dan kemudahan akses informasi bagi masyarakat.',
            'tahun' => '2022',
            'file' => 'sertifikat-potrait-02.jpg',
            'orientasi' => 'portrait',
        ],
        [
            'judul' => 'Sertifikat Penghargaan Kinerja Anggaran Terbaik',
            'deskripsi' => 'Apresiasi atas pengelolaan dan penyerapan anggaran yang efektif dan akuntabel.',
            'tahun' => '2022',
            'file' => 'sertifikat-05.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Piagam Penghargaan Arsip Berkualitas',
            'deskripsi' => 'Diberikan atas pengelolaan tata kearsipan yang tertib dan sesuai standar kearsipan nasional.',
            'tahun' => '2021',
            'file' => 'sertifikat-06.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Sertifikat Penghargaan Reformasi Birokrasi',
            'deskripsi' => 'Pengakuan atas upaya perbaikan tata kelola dan pelayanan melalui reformasi birokrasi.',
            'tahun' => '2021',
            'file' => 'sertifikat-07.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Piagam Penghargaan Kepatuhan Pelaporan LHKPN',
            'deskripsi' => 'Apresiasi atas tingkat kepatuhan pelaporan Laporan Harta Kekayaan Penyelenggara Negara.',
            'tahun' => '2021',
            'file' => 'sertifikat-08.jpg',
            'orientasi' => 'landscape',
        ],
        [
            'judul' => 'Sertifikat Penghargaan Pengelolaan Data Geospasial',
            'deskripsi' => 'Diberikan atas kontribusi dalam penyediaan dan pengelolaan data informasi geospasial kehutanan.',
            'tahun' => '2020',
            'file' => 'sertifikat-09.jpg',
            'orientasi' => 'landscape',
        ],
    ];

    return view('pages.publikasi.penghargaan', compact('penghargaan'));
}

public function dokumentasi(): View
{
    // link dokumentasi kegiatan BPKH
    $dokumentasi = [
        [
          'url' => 'https://www.instagram.com/p/DawiJpvH16q/',
          'image' => 'images/dok-kegiatan/kegiatan-06.jpg',
          'title' => 'Kegiatan Evaluasi Anggaran DIPA Tahun Anggaran 2026'
        ],
        [
            'url' => 'https://www.instagram.com/p/DXnmj6eE2bT/',
            'image' => 'images/dok-kegiatan/kegiatan-01.jpg',
            'title' => 'Kegiatan Menanam dan Berbagi Pohon'
        ],
        [
            'url' => 'https://www.instagram.com/p/DPLDpCNk1_L/',
            'image' => 'images/dok-kegiatan/kegiatan-02.jpg',
            'title' => 'Inventarisasi Hutan Nasional (IHN) 2.0 di Kabupaten Banggai'
        ],
        [
            'url' => 'https://www.instagram.com/p/DNU3YKPzouy/',
            'image' => 'images/dok-kegiatan/kegiatan-03.jpg',
            'title' => 'Tanam Pohon, Tanam Harapan, Rayakan HUT RI ke-80 dan Hari Pramuka ke-64'
        ],
        [
           'url' => 'https://www.instagram.com/p/DZFXFvMT9X5/',
           'image' => 'images/dok-kegiatan/reels/reels-kegiatan-01.jpg',
           'title' => 'Kegiatan Verifikasi PNBP PKH PT. Hengjaya Mineralindo'
        ],
        [
          'url' => 'https://www.instagram.com/p/DXnhOyjk-g4/',
          'image' => 'images/dok-kegiatan/kegiatan-04.jpg',
          'title' => 'Kegiatan Bimbingan Teknis Aplikasi SINERGY'
        ],
        [
          'url' => 'https://www.instagram.com/p/DUmgsark0JZ/',
          'image' => 'images/dok-kegiatan/reels/reels-kegiatan-02.jpg',
          'title' => 'Inventarisasi Hutan Mangrove ( IHM ) skala Nasional Gelombang III Tahun 2026 Di Kabupaten Banggai'
        ],
        [
          'url' => 'https://www.instagram.com/p/DOrw6-mE_qk/',
          'image' => 'images/dok-kegiatan/kegiatan-05.jpg',
          'title' => 'Supervisi Dan Pengawasan Pelaksana Penataan Batas Areal PPKH Di Kabupaten Morowali'
        ],
        [
            'url' => 'https://www.instagram.com/p/DPVCt2LkzIh/',
            'image' => 'images/dok-kegiatan/reels/reels-kegiatan-03.jpg',
            'title' => 'Inventarisasi Hutan Nasional (IHN) 2.0 kali ini hadir di kawasan hutan mangrove kabupaten Morowali'
        ]

    ];

    return view('pages.publikasi.dokumentasi', compact('dokumentasi'));
}
}
