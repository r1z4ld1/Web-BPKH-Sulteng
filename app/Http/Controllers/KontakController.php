<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class KontakController extends Controller
{
    public function lentera(): View
    {
        $nomorWhatsapp = '628114321616';

        $layananLentera = [
            ['nomor' => '01', 'judul' => 'Analisis Status dan Fungsi Kawasan Hutan'],
            ['nomor' => '02', 'judul' => 'Data Informasi Geospasial'],
            ['nomor' => '03', 'judul' => 'Supervisi Kawasan Hutan'],
            ['nomor' => '04', 'judul' => 'Survey Hutan Alam Primer (PIPPIB)'],
            ['nomor' => '05', 'judul' => 'Klarifikasi Status Kawasan Hutan'],
            ['nomor' => '06', 'judul' => 'Verifikasi PNBP-PKH Self Assessment (Mandiri)'],
        ];

        $jamOperasional = [
            ['hari' => 'Senin – Kamis', 'jam' => '07.30 – 16.00 WITA'],
            ['hari' => 'Jumat', 'jam' => '07.30 – 16.30 WITA'],
            ['hari' => 'Sabtu, Minggu, Libur Nasional', 'jam' => 'Tutup'],
        ];

        return view('pages.kontak.lentera', compact('nomorWhatsapp', 'layananLentera', 'jamOperasional'));
    }

    public function surveiAntiKorupsi(): View
{
    $googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSdo-QvYa0JPrxTw-6vZkPmZyVbMJR6086uzoZYiXnnNb2z00w/viewform?embedded=true';
    $googleFormUrlOriginal = 'https://docs.google.com/forms/d/e/1FAIpQLSdo-QvYa0JPrxTw-6vZkPmZyVbMJR6086uzoZYiXnnNb2z00w/viewform';

    return view('pages.kontak.survei-anti-korupsi', compact('googleFormUrl', 'googleFormUrlOriginal'));
}

public function pengaduan(): View
{
    $googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSfSXfcFxE4kHuCUwexrGM7L3_p62bGn8Raki0aC1SEDc5guSg/viewform?embedded=true';
    $googleFormUrlOriginal = 'https://docs.google.com/forms/d/e/1FAIpQLSfSXfcFxE4kHuCUwexrGM7L3_p62bGn8Raki0aC1SEDc5guSg/viewform';

    return view('pages.kontak.pengaduan', compact('googleFormUrl', 'googleFormUrlOriginal'));
}
}
