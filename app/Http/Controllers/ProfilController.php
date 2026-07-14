<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfilController extends Controller
{
    public function sejarah(): View
    {
        $milestones = [
            [
                'tahun' => 'Periode 01 (2007-2009)',
                'judul' => 'Cikal bakal unit kerja kehutanan wilayah XVI Palu',
                'deskripsi' => 'Dibentuk unit kerja awal yang menangani inventarisasi dan tata batas kawasan hutan di wilayah Sulawesi Tengah, sebagai bagian dari struktur kehutanan pusat.',
            ],
            [
                'tahun' => 'Periode 02 (2009-2012)',
                'judul' => 'Penetapan sebagai Balai Pemantapan Kawasan Hutan',
                'deskripsi' => 'Melalui restrukturisasi organisasi Kementerian Kehutanan, unit kerja ini ditetapkan secara resmi sebagai Balai Pemantapan Kawasan Hutan dengan wilayah kerja Sulawesi Tengah.',
            ],
            [
                'tahun' => 'Periode 03 (2012-2014)',
                'judul' => 'Integrasi ke Direktorat Jenderal Planologi Kehutanan dan Tata Lingkungan',
                'deskripsi' => 'Mengikuti perubahan nomenklatur kementerian, BPKH berada di bawah koordinasi Direktorat Jenderal Planologi Kehutanan dan Tata Lingkungan.',
            ],
            [
                'tahun' => 'Periode 04 (2014--2016)',
                'judul' => 'Modernisasi layanan publik',
                'deskripsi' => 'Menghadirkan layanan digital untuk mempermudah akses masyarakat terhadap informasi dan permohonan terkait kawasan hutan.',
            ],
            [
                'tahun' => 'Periode 05 (2016-2019)',
                'judul' => 'Penguatan kapasitas SDM dan infrastruktur',
                'deskripsi' => 'Meningkatkan kompetensi staf dan memperkuat fasilitas teknis untuk mendukung pengelolaan kawasan hutan yang lebih efektif.',
            ],
            [
                'tahun' => 'Periode 06 (2019-2024)',
                'judul' => 'Kolaborasi lintas sektor',
                'deskripsi' => 'Bekerja sama dengan pemerintah daerah, lembaga penelitian, dan masyarakat untuk pengelolaan kawasan hutan yang berkelanjutan.',
            ],
            [
                'tahun' => 'Periode 07 (2024-Sekarang)',
                'judul' => 'Transformasi digital dan inovasi layanan',
                'deskripsi' => 'Mengimplementasikan sistem informasi berbasis digital untuk meningkatkan transparansi, efisiensi, dan kualitas layanan publik terkait kawasan hutan.',
            ],
        ];

        return view('pages.profil.sejarah', compact('milestones'));
    }

    public function tugasFungsi(): View
{
    $fungsi = [
        'Pelaksanaan penataan batas, rekonstruksi batas, pemetaan kawasan hutan, dan sosialisasi batas kawasan hutan.',
        'Pelaksanaan inventarisasi dan verifikasi penguasaan tanah dalam kawasan hutan.',
        'Pelaksanaan monitoring, evaluasi, dan penilaian penggunaan kawasan hutan.',
        'Pelaksanaan penilaian teknis tata batas penataan batas areal kerja perizinan berusaha pemanfaatan hutan, persetujuan pengelolaan perhutanan sosial, persetujuan penggunaan kawasan hutan, persetujuan pelepasan kawasan hutan, dan penetapan kawasan hutan dengan tujuan tertentu.',
        'Pelaksanaan inventarisasi hutan skala nasional di wilayah.',
        'Pelaksanaan pengumpulan, pengolahan, dan penyajian data dan informasi sumber daya hutan di bidang planologi kehutanan.',
        'Penyebarluasan informasi geospasial kehutanan.',
        'Pelaksanaan penyiapan dan penyajian data dan informasi perencanaan kehutanan, pengukuhan kawasan hutan, penatagunaan kawasan hutan, wilayah pengelolaan hutan, pemanfaatan hutan, dan penggunaan kawasan hutan.',
        'Pelaksanaan penyusunan rencana, program, anggaran, dan pelaporan, urusan administrasi sumber daya manusia, keuangan, pengelolaan barang milik/kekayaan negara, tata persuratan, kearsipan, kerumahtanggaan, hubungan masyarakat, advokasi hukum, dan pengelolaan data dan informasi.',
    ];

    $bagian = [
        ['kode' => 'Eselon III', 'nama' => 'Kepala Balai'],
        ['kode' => 'Eselon IV', 'nama' => 'Sub Bagian Tata Usaha'],
        ['kode' => 'Eselon IV', 'nama' => 'Seksi Pengukuhan dan Perencanaan Kawasan Hutan'],
        ['kode' => 'Eselon IV', 'nama' => 'Seksi Sumber Daya Hutan'],
        ['kode' => 'Fungsional', 'nama' => 'Kelompok Jabatan Fungsional'],
    ];

    $wilayahKerja = [
        'Kota Palu',
        'Kabupaten Banggai',
        'Kabupaten Banggai Kepulauan',
        'Kabupaten Banggai Laut',
        'Kabupaten Buol',
        'Kabupaten Donggala',
        'Kabupaten Morowali',
        'Kabupaten Morowali Utara',
        'Kabupaten Parigi Moutong',
        'Kabupaten Poso',
        'Kabupaten Sigi',
        'Kabupaten Tojo Una-Una',
        'Kabupaten Toli-Toli',
    ];

    return view('pages.profil.tugas-fungsi', compact('fungsi', 'bagian', 'wilayahKerja'));
}

public function visiMisi(): View
{
    $maknaVisi = [
        [
            'judul' => 'Kepastian Kawasan Hutan',
            'deskripsi' => 'Pengukuhan kawasan hutan, penyediaan data dan informasi sumber daya hutan, serta perencanaan dan pengendalian penggunaan kawasan hutan yang berdampak pada kepastian berusaha dan keadilan sumber daya lahan.',
        ],
        [
            'judul' => 'Optimasi Kawasan Hutan',
            'deskripsi' => 'Kawasan hutan yang mantap dioptimasikan untuk mendukung pembangunan nasional, terutama ketahanan energi, air, kemandirian pangan, dan keseimbangan lingkungan yang berkelanjutan.',
        ],
        [
            'judul' => 'Penguatan Fondasi Transformasi',
            'deskripsi' => 'Kepastian dan optimasi kawasan hutan mengawal penguatan fondasi transformasi Indonesia sebagai tahapan lima tahun pertama menuju Indonesia Emas 2045.',
        ],
    ];

    $misi = [
        [
            'icon' => 'leaf',
            'judul' => 'Pengelolaan Hutan Berkelanjutan',
            'deskripsi' => 'Memastikan kawasan hutan yang mantap untuk mewujudkan pengelolaan hutan yang berkelanjutan.',
        ],
        [
            'icon' => 'bolt',
            'judul' => 'Dukungan Pembangunan Nasional',
            'deskripsi' => 'Memastikan optimasi kawasan hutan untuk mendukung pembangunan nasional khususnya ketahanan energi, air, dan kemandirian pangan.',
        ],
        [
            'icon' => 'refresh',
            'judul' => 'Transformasi Tata Kelola',
            'deskripsi' => 'Transformasi tata kelola pemerintahan BPKH Wilayah XVI untuk kelembagaan tepat fungsi, SDM berbasis merit, kebijakan berbasis bukti, manajemen risiko, serta pelayanan publik berkualitas berbasis digitalisasi.',
        ],
    ];

    $tujuan = [
        ['nomor' => '01', 'judul' => 'Kawasan Hutan yang Mantap', 'deskripsi' => 'Kawasan hutan yang legal dan legitimate.'],
        ['nomor' => '02', 'judul' => 'Pemantauan Akurat', 'deskripsi' => 'Potensi dan kondisi kawasan hutan terpantau secara akurat dan aktual.'],
        ['nomor' => '03', 'judul' => 'Penerimaan Negara Optimal', 'deskripsi' => 'Penerimaan negara yang optimal dari penggunaan dan pelepasan kawasan hutan.'],
        ['nomor' => '04', 'judul' => 'Tata Kelola Berintegritas', 'deskripsi' => 'Tata kelola pemerintahan yang berintegritas, efisien, efektif, dan kolaboratif.'],
    ];

    return view('pages.profil.visi-misi', compact('maknaVisi', 'misi', 'tujuan'));
}

public function struktur(): View
{
    $kelompokFungsional = [
        'Pengendali Ekosistem Hutan (PEH)',
        'Surveyor Pemetaan (SURTA)',
        'Arsiparis',
        'Perencana',
        'Analis Hukum',
        'Analis Sumber Daya Manusia',
        'Pranata Komputer',
    ];

    return view('pages.profil.struktur', compact('kelompokFungsional'));
}

public function motto(): View
{
    $pilar = [
        [
            'kata' => 'Sigap',
            'warna' => 'primary',
            'icon' => 'bolt',
            'deskripsi' => 'Selalu cepat, tanggap, dan proaktif dalam menyelesaikan tugas serta memberikan solusi.',
            'penerapan' => 'Merespons permohonan dan pengaduan masyarakat tanpa menunda, serta sigap menindaklanjuti persoalan teknis di lapangan.',
        ],
        [
            'kata' => 'Berintegritas',
            'warna' => 'highlight',
            'icon' => 'shield',
            'deskripsi' => 'Menjunjung tinggi kejujuran, disiplin, akuntabilitas, dan konsisten terhadap peraturan perundang-undangan.',
            'penerapan' => 'Bekerja sesuai prosedur dan dasar hukum yang berlaku, serta terbuka terhadap pengawasan dan evaluasi.',
        ],
        [
            'kata' => 'Melayani',
            'warna' => 'secondary',
            'icon' => 'hand',
            'deskripsi' => 'Memberikan pelayanan publik yang profesional, ramah, transparan, dan berorientasi pada kepuasan masyarakat.',
            'penerapan' => 'Menghadirkan layanan yang mudah diakses, informasi yang jelas, dan sikap yang terbuka kepada setiap pemohon.',
        ],
    ];

    return view('pages.profil.motto', compact('pilar'));
}

public function coreValues(): View
{
    $values = [
        [
            'huruf' => 'Ber',
            'kata' => 'Berorientasi Pelayanan',
            'warna' => 'primary',
            'perilaku' => [
                'Memahami dan memenuhi kebutuhan masyarakat.',
                'Ramah, cekatan, solutif, dan dapat diandalkan.',
                'Melakukan perbaikan tiada henti.',
            ],
        ],
        [
            'huruf' => 'A',
            'kata' => 'Akuntabel',
            'warna' => 'secondary',
            'perilaku' => [
                'Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, serta disiplin dan berintegritas tinggi.',
                'Menggunakan kekayaan dan barang milik negara secara bertanggung jawab, efektif dan efisien.',
                'Tidak menyalahgunakan kewenangan jabatan.',
            ],
        ],
        [
            'huruf' => 'K',
            'kata' => 'Kompeten',
            'warna' => 'highlight',
            'perilaku' => [
                'Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah.',
                'Membantu orang lain belajar.',
                'Melaksanakan tugas dengan kualitas terbaik.',
            ],
        ],
        [
            'huruf' => 'H',
            'kata' => 'Harmonis',
            'warna' => 'action',
            'perilaku' => [
                'Menghargai setiap orang apapun latar belakangnya.',
                'Suka menolong orang lain.',
                'Membangun lingkungan kerja yang kondusif.',
            ],
        ],
        [
            'huruf' => 'L',
            'kata' => 'Loyal',
            'warna' => 'primary',
            'perilaku' => [
                'Memegang teguh ideologi Pancasila dan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945.',
                'Setia kepada NKRI serta pemerintahan yang sah.',
                'Menjaga nama baik sesama ASN, pimpinan, instansi dan negara, serta menjaga rahasia jabatan dan negara.',
            ],
        ],
        [
            'huruf' => 'A',
            'kata' => 'Adaptif',
            'warna' => 'secondary',
            'perilaku' => [
                'Cepat menyesuaikan diri menghadapi perubahan.',
                'Terus berinovasi dan mengembangkan kreativitas.',
                'Bertindak proaktif.',
            ],
        ],
        [
            'huruf' => 'K',
            'kata' => 'Kolaboratif',
            'warna' => 'highlight',
            'perilaku' => [
                'Memberi kesempatan kepada berbagai pihak untuk berkontribusi.',
                'Terbuka dalam bekerja sama untuk menghasilkan nilai tambah.',
                'Menggerakkan pemanfaatan berbagai sumber daya untuk tujuan bersama.',
            ],
        ],
    ];

    $pejabat = [
        ['nama' => 'Victor W.R. Lembang S.Hut.,M.Si.', 'jabatan' => 'Kepala Balai', 'foto' => 'kepala-balai.png'],
        ['nama' => 'Hery Prastowo Budi S.P.,M.P.W.P.', 'jabatan' => 'Kepala Seksi Sumber Daya Hutan', 'foto' => 'kasi-sdh.png'],
        ['nama' => 'Prasti Sirappa S.P.,M.Si.', 'jabatan' => 'Kepala Seksi Pengukuhan dan Perencanaan Kawasan Hutan', 'foto' => 'kasi-pkh.png'],
        ['nama' => 'Dr. Pria Kurnijanto S.Hut.,M.Si.', 'jabatan' => 'Kepala Subbagian Tata Usaha', 'foto' => 'kasubbag-tu.png'],
    ];

    return view('pages.profil.core-values', compact('values', 'pejabat'));
}
}
