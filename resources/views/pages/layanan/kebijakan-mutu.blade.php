@extends('layouts.app')

@section('content')

    <x-page-header
        title="Kebijakan Mutu"
        :breadcrumb="[
            ['label' => 'Layanan', 'url' => route('layanan.alur')],
            ['label' => 'Kebijakan Mutu', 'url' => route('layanan.kebijakan-mutu')],
        ]"
    />

    {{-- PERNYATAAN KOMITMEN --}}
    <section class="relative overflow-hidden bg-contrast py-14 sm:py-18 lg:py-24">
        <svg class="hidden lg:block absolute -left-16 -top-16 -bottom-16 w-80 h-80  opacity-10 transition-transform duration-1000 hover:scale-105 hover:rotate-3" viewBox="0 0 260 260" fill="none" aria-hidden="true">
            <circle cx="130" cy="130" r="20" stroke="#F5F3EC" stroke-width="1" stroke-dasharray="4 4" class="animate-[spin_20s_linear_infinite] origin-center"/>
            <circle cx="130" cy="130" r="40" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="60" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="95" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="128" stroke="#C89B3C" stroke-width="1"/>
            <circle cx="130" cy="130" r="140" stroke="#C89B3C" stroke-width="1" stroke-dasharray="8 8" class="animate-[spin_30s_linear_infinite_reverse] origin-center"/>
        </svg>

        <div class="relative mx-auto max-w-4xl px-6 sm:px-8 lg:px-12 text-center z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                <p class="font-mono text-xs text-secondary uppercase tracking-widest">
                    Kebijakan Mutu Balai Pemantapan Kawasan Hutan Wilayah XVI Palu
                </p>
            </div>
            <h1 class="font-serif font-medium text-2xl sm:text-3xl lg:text-4xl leading-snug text-white">
                Berkomitmen melakukan peningkatan Sistem Manajemen Mutu secara
                terus-menerus untuk memberikan kepuasan pelanggan
            </h1>
        </div>
    </section>

  {{-- 5 POIN KEBIJAKAN --}}
    <section class="bg-canvas py-14 sm:py-16 lg:py-20 font-sans">
        <div class="mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">

            {{-- Daftar Poin Kebijakan --}}
            <div class="space-y-5 mb-16">
                @foreach ($poin as $i => $item)
                    {{-- PERBAIKAN: Menggunakan bg-canvas sebagai warna dasar dan hover:bg-white saat disorot --}}
                    <div class="group relative flex flex-col sm:flex-row gap-6 overflow-hidden rounded-2xl border border-contrast/10 bg-canvas p-6 lg:p-7
                                transition-all duration-500 ease-smooth hover:bg-white hover:shadow-xl hover:shadow-primary/5 hover:border-transparent">

                        {{-- Aksen Garis Kiri yang Tumbuh Ke Bawah Saat Hover --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary origin-top scale-y-0 transition-transform duration-500 ease-out group-hover:scale-y-100"></div>

                        {{-- Box Nomor Urut --}}
                        <div class="relative w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center shrink-0
                                    transition-all duration-500 group-hover:bg-primary group-hover:shadow-md group-hover:shadow-primary/40">
                            <span class="text-primary font-bold text-lg transition-all duration-500 group-hover:text-white group-hover:scale-110 group-hover:-rotate-6">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>

                        {{-- Konten Teks Kebijakan Mutu --}}
                        <div class="flex-1">
                            <h3 class="font-medium text-lg sm:text-xl mb-1.5 text-contrast transition-colors duration-300 group-hover:text-primary">
                                Kebijakan Mutu {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </h3>
                            <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
                                {{ $item }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Komitmen Kesesuaian (Blok Info) --}}
            <div class="relative overflow-hidden rounded-2xl bg-action/5 border border-action/20 p-6 sm:p-8 mb-16 flex flex-col sm:flex-row gap-5 sm:items-center">
                {{-- Aksen Latar --}}
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-action/10 rounded-full blur-3xl"></div>

                {{-- Ikon --}}
                <div class="flex-shrink-0 bg-white p-3.5 rounded-full shadow-sm border border-action/10 z-10">
                    <svg class="w-6 h-6 text-action" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>

                {{-- Teks Komitmen --}}
                <div class="relative z-10">
                    <h4 class="font-bold text-contrast mb-1.5 text-base sm:text-lg">Komitmen Kesesuaian</h4>
                    <p class="text-sm sm:text-base leading-relaxed text-contrast/75">
                        Kebijakan Mutu ini akan selalu ditinjau untuk kesesuaiannya dan harus dipahami oleh
                        seluruh personel Balai Pemantapan Kawasan Hutan Wilayah XVI Palu, serta menjadi
                        kerangka kerja untuk menetapkan dan meninjau program mutu.
                    </p>
                </div>
            </div>

            {{-- BLOK PENGESAHAN --}}
            <div class="flex justify-center md:justify-end">
                <div class="relative w-full sm:w-[340px] rounded-3xl border border-contrast/10 bg-white p-8 sm:p-10 shadow-sm text-center group hover:shadow-md transition-shadow duration-300">

                    {{-- Ikon Watermark Samar di Belakang Tanda Tangan --}}
                    <div class="absolute top-6 right-6 opacity-[0.03] text-contrast pointer-events-none transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12">
                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-2.33v8.02z"/>
                        </svg>
                    </div>

                    <div class="relative z-10">
                        <p class="text-xs font-bold uppercase tracking-widest text-contrast/50 mb-6">{{ $pengesahan['tempat_tanggal'] }}</p>
                        <p class="text-sm font-semibold text-contrast mb-24">{{ $pengesahan['jabatan'] }}</p>

                        {{-- Area Tanda Tangan --}}
                        <div class="border-t-2 border-dashed border-contrast/20 pt-4 mt-8">
                            <p class="font-bold text-base text-contrast">{{ $pengesahan['nama'] }}</p>
                            <p class="font-mono text-xs text-contrast/50 mt-1">NIP. {{ $pengesahan['nip'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
