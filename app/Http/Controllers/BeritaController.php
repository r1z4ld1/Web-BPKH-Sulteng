<?php

namespace App\Http\Controllers;

use App\Support\BeritaData;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(): View
    {
        $kategori = ['Semua', 'Kegiatan', 'Koordinasi', 'Pelatihan'];
        $berita = BeritaData::all();

        return view('pages.berita.index', compact('kategori', 'berita'));
    }

    public function show(string $slug): View
    {
        $semua = BeritaData::all();
        $berita = collect($semua)->firstWhere('slug', $slug);

        abort_if(!$berita, 404);

        $terkait = collect($semua)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('pages.berita.show', compact('berita', 'terkait'));
    }
}
