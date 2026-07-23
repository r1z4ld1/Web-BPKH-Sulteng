@extends('layouts.app')

@section('content')

    <x-page-header
        title="Struktur Organisasi"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Struktur Organisasi', 'url' => route('profil.struktur')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">

            {{-- ============ SECTION 1: JUDUL UTAMA (Posisi Tengah) ============ --}}
            <div class="flex flex-col items-center text-center mb-10 sm:mb-14">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v18M4 8h5m-5 5h5m6-10v18m0-14h5m-5 5h5"/>
                        </svg>
                    </div>
                    <h2 class="font-serif text-4xl lg:text-4xl font-semibold">
                        Struktur Organisasi
                    </h2>
                </div>

                <p class="text-sm sm:text-base text-contrast/70 leading-relaxed max-w-3xl mx-auto">
                    Berdasarkan Peraturan Menteri Kehutanan Republik Indonesia Nomor 3 Tahun 2025 tentang
                    Organisasi dan Tata Kerja Balai Pemantapan Kawasan Hutan, struktur organisasi
                    Balai Pemantapan Kawasan Hutan Wilayah XVI terdiri dari
                    <strong class="font-semibold text-primary">1 (satu) Eselon III</strong>,
                    <strong class="font-semibold text-primary">3 (tiga) Eselon IV</strong>,
                    dan Kelompok Jabatan Fungsional.
                </p>
            </div>

            {{-- ============ SECTION 2: BAGAN GAMBAR (Responsif 3 Perangkat) ============ --}}
            <div
                x-data="{ zoomed: false }"
                class="rounded-2xl border border-contrast/10 bg-white p-4 sm:p-6 lg:p-10 mb-4 shadow-sm hover:shadow-md transition-shadow duration-300"
            >
                <button
                    type="button"
                    @click="zoomed = true"
                    class="block w-full cursor-zoom-in group relative"
                    aria-label="Perbesar bagan struktur organisasi"
                >
                    {{-- Overlay hint untuk Desktop (muncul saat di-hover) --}}
                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg hidden sm:flex items-center justify-center">
                        <div class="bg-white/95 px-5 py-2.5 rounded-full shadow-sm text-sm font-medium text-gray-700 flex items-center gap-2 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" d="m20 20-3.5-3.5M11 8v6M8 11h6"/></svg>
                            Klik untuk memperbesar gambar
                        </div>
                    </div>

                    <img
                        src="{{ asset('images/profil/struktur-organisasi.png') }}"
                        alt="Bagan struktur organisasi BPKH Wilayah XVI"
                        class="mx-auto w-full max-w-3xl h-auto object-contain"
                        loading="lazy"
                    >
                </button>

                {{-- Hint untuk Mobile --}}
                <p class="sm:hidden text-center text-xs text-contrast/50 mt-4 flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" d="m20 20-3.5-3.5M11 8v6M8 11h6"/>
                    </svg>
                    Ketuk gambar untuk memperbesar
                </p>

                {{-- Overlay zoom --}}
                <div
                    x-show="zoomed"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="zoomed = false"
                    @keydown.escape.window="zoomed = false"
                    class="fixed inset-0 z-[60] bg-contrast/95 flex items-center justify-center p-4 sm:p-8 lg:p-12 cursor-zoom-out"
                >
                    <button
                        type="button"
                        @click.stop="zoomed = false"
                        aria-label="Tutup"
                        class="absolute top-4 right-4 sm:top-6 sm:right-6 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/30 transition-colors duration-200"
                    >
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <img
                        src="{{ asset('images/profil/struktur-organisasi.png') }}"
                        alt="Bagan struktur organisasi BPKH Wilayah XVI (perbesar)"
                        class="w-full max-w-5xl max-h-[90vh] object-contain rounded-lg shadow-2xl"
                        @click.stop
                    >
                </div>
            </div>

            <p class="text-xs sm:text-sm text-contrast/50 text-center mb-16 max-w-2xl mx-auto">
                Kotak dengan garis ganda menandakan Kelompok Jabatan Fungsional tersebar di masing-masing unit, bukan unit tersendiri yang berdiri sendiri.
                Sumber: Peraturan Menteri Kehutanan Nomor 3 Tahun 2025.
            </p>

            {{-- ============ SECTION 3: KELOMPOK JABATAN FUNGSIONAL ============ --}}
            <div class="border-t border-contrast/10 pt-16">

                {{-- Judul Fungsional di Tengah --}}
                <div class="flex flex-col items-center text-center mb-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-highlight flex items-center justify-center shrink-0 shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 100-8 4 4 0 000 8zm6 4c0-2.5-2.5-4.5-6-4.5s-6 2-6 4.5"/>
                            </svg>
                        </div>
                        <h2 class="font-serif text-4xl lg:text-4xl font-semibold">
                            Kelompok Jabatan Fungsional
                        </h2>
                    </div>

                    <p class="text-sm sm:text-base text-contrast/70 leading-relaxed max-w-3xl mx-auto">
                        Kelompok Jabatan Fungsional ditempatkan pada masing-masing unit — Subbagian Tata Usaha,
                        Seksi Pengukuhan dan Perencanaan Kawasan Hutan, serta Seksi Sumber Daya Hutan — untuk
                        mendukung kelancaran tugas pokok dan fungsi setiap unit, dengan tetap melaksanakan
                        kegiatan sesuai jabatan fungsional masing-masing berdasarkan peraturan perundang-undangan yang berlaku.
                    </p>
                </div>

                @if (isset($kelompokFungsional) && count($kelompokFungsional) > 0)
                    {{-- Menggunakan Flex Wrap & Justify Center agar rapi merapat ke tengah --}}
                    <div class="flex flex-wrap justify-center gap-3 sm:gap-4">
                        @foreach ($kelompokFungsional as $jabatan)
                            <div class="flex items-center gap-3 rounded-xl border border-contrast/10 bg-white px-5 py-3.5
                                        transition-all duration-300 ease-smooth hover:border-secondary hover:shadow-md hover:-translate-y-1 cursor-default
                                        w-full sm:w-[calc(50%-0.5rem)] md:w-auto md:min-w-[240px]">
                                <span class="w-2 h-2 rounded-full bg-highlight shrink-0"></span>
                                <span class="text-sm font-medium text-contrast/80">{{ $jabatan }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </section>

@endsection
