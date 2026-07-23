@extends('layouts.app')

@section('content')

    <x-page-header
        title="Peta Kawasan Hutan"
        :breadcrumb="[
            ['label' => 'Peta Kawasan Hutan', 'url' => route('peta.index')],
        ]"
    />

    <section class="bg-canvas py-12 sm:py-16 lg:py-20 relative overflow-hidden">
        {{-- Dekorasi Latar Belakang (Opsional: Memberi kesan modern) --}}
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- Bagian Teks Pengantar --}}
            <div class="max-w-3xl mb-8 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl font-serif font-semibold text-contrast mb-3">Kawasan Hutan Sulawesi Tengah</h2>
                <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
                    Peta interaktif kawasan hutan wilayah kerja Balai Pemantapan Kawasan Hutan Kota Palu
                    di Provinsi Sulawesi Tengah. Gunakan fitur zoom dan klik area pada peta untuk melihat informasi detail status kawasan.
                </p>
            </div>

            {{--
                CONTAINER UTAMA PETA
                Class 'isolate z-0' adalah kunci untuk mencegah peta tumpah menimpa navbar.
                Ini mengurung semua z-index tinggi milik OpenStreetMap di dalam kotak ini saja.
            --}}
            <div class="relative flex flex-col bg-white rounded-2xl sm:rounded-3xl border border-contrast/10 shadow-xl overflow-hidden isolate z-0 transition-shadow hover:shadow-2xl duration-300">

                {{-- Header / Toolbar Peta --}}
                <div class="px-5 py-4 border-b border-contrast/10 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gradient-to-r from-canvas/50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-contrast text-sm sm:text-base">Sistem Informasi Geografis</h3>
                            <p class="text-[11px] sm:text-xs text-contrast/50">Update Data Terakhir: Otomatis</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex items-center gap-2 text-xs font-semibold px-3 py-1.5 rounded-full bg-green-500/10 text-green-600 border border-green-500/20">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            Live Map Aktif
                        </span>
                    </div>
                </div>

                {{-- Area Utama Peta --}}
                {{-- Menggunakan min-h dan vh agar peta responsif menyesuaikan tinggi layar --}}
                <div class="relative w-full h-[55vh] min-h-[400px] sm:min-h-[500px] lg:min-h-[650px] bg-[#e5e7eb]">

                    {{-- Div Target OpenStreetMap --}}
                    <div id="peta-kawasan-hutan" class="absolute inset-0 w-full h-full z-10"></div>

                    {{-- Animasi Loading State yang Elegan (Kaca Blur) --}}
                    <div id="peta-loading" class="absolute inset-0 bg-white/70 backdrop-blur-sm flex flex-col items-center justify-center gap-4 z-50 transition-opacity duration-300">
                        <div class="relative flex items-center justify-center w-14 h-14">
                            <svg class="absolute inset-0 w-full h-full text-primary/20 animate-spin" viewBox="0 0 100 100" fill="none">
                                <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="8"></circle>
                            </svg>
                            <svg class="absolute inset-0 w-full h-full text-primary animate-spin" viewBox="0 0 100 100" fill="none" stroke-dasharray="283" stroke-dashoffset="200">
                                <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="8" stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-contrast/70 animate-pulse tracking-wide">Memuat data spasial...</p>
                    </div>

                    {{-- Empty State --}}
                    <div id="peta-empty-state" class="hidden absolute inset-0 bg-white/90 backdrop-blur-sm flex flex-col items-center justify-center gap-4 z-50 px-6 text-center">
                        <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-2 shadow-inner">
                            <svg class="w-8 h-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-6-3V4l6 3m0 13l6-3m-6 3V7m6 10l6 3V7l-6-3m0 13V4m0 3L9 4"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-contrast">Data Peta Belum Tersedia</h4>
                        <p class="text-sm text-contrast/60 max-w-md leading-relaxed">
                            Mohon maaf, file data kawasan hutan (GeoJSON) saat ini belum ditambahkan ke sistem. Silakan hubungi administrator.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Footer Informasi Sumber --}}
            <div class="flex items-start sm:items-center gap-3 mt-5 px-2">
                <svg class="w-4 h-4 text-primary shrink-0 mt-0.5 sm:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs sm:text-sm text-contrast/60">
                    Data kawasan hutan bersumber dari hasil pemetaan resmi <span class="font-medium text-contrast">BPKH Wilayah XVI Kota Palu</span>.
                </p>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
    @vite('resources/js/peta.js')
@endpush
