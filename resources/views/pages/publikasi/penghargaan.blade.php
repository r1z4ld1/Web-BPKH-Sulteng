@extends('layouts.app')

@section('content')

    <x-page-header
        title="Penghargaan"
        :breadcrumb="[
            ['label' => 'Publikasi', 'url' => route('publikasi.peraturan')],
            ['label' => 'Penghargaan', 'url' => route('publikasi.penghargaan')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-24 font-sans relative overflow-hidden">
        {{-- Efek Latar Belakang Geometris Samar --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 relative z-10">

            {{-- Bagian Header & Statistik --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 lg:mb-16">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl font-serif text-contrast mb-4 tracking-tight">Prestasi & Pengakuan</h2>
                    <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
                        Sertifikat dan penghargaan yang diraih Balai Pemantapan Kawasan Hutan Wilayah XVI Palu
                        sebagai bentuk pengakuan nyata atas kualitas tata kelola, inovasi, dan dedikasi dalam pelayanan publik.
                    </p>
                </div>

                {{-- Badge Total Penghargaan --}}
                <div class="inline-flex items-center gap-3 bg-white border border-contrast/10 rounded-2xl p-4 shadow-sm shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-contrast/50 uppercase tracking-wider mb-0.5">Total Pencapaian</p>
                        <p class="text-xl font-bold text-contrast"><span class="text-primary">{{ count($penghargaan) }}</span> Sertifikat</p>
                    </div>
                </div>
            </div>

            {{-- BENTO GRID PENGHARGAAN: Layout Cerdas tanpa celah kosong --}}
            {{-- Gunakan baris kode ini jika jumlah sertifikat tidak genap, agar tetap rapi dan seimbang ---}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 grid-flow-row-dense">

                @foreach ($penghargaan as $item)
                    {{--
                        LOGIKA SPAN (Lebar Kartu):
                        - Portrait: Ambil 1 kolom (Layar HP, Tablet, Desktop)
                        - Landscape: Ambil 1 kolom di HP, 2 kolom di Tablet/Desktop
                    --}}
                    <div x-data="{ zoomed: false }"
                         class="group flex flex-col h-full bg-white rounded-3xl border border-contrast/10 overflow-hidden shadow-sm transition-all duration-500 hover:shadow-xl hover:shadow-primary/10 hover:border-primary/30 hover:-translate-y-2 relative
                                {{ $item['orientasi'] === 'portrait' ? 'col-span-1 md:col-span-1 lg:col-span-1' : 'col-span-1 md:col-span-2 lg:col-span-2' }}">

                        {{-- Garis Aksen Atas (Muncul saat hover) --}}
                        <div class="absolute top-0 left-0 w-full h-1 bg-primary origin-left scale-x-0 transition-transform duration-500 ease-out group-hover:scale-x-100 z-20"></div>

                        {{-- Area Gambar --}}
                        <button
                            type="button"
                            @click="zoomed = true"
                            aria-label="Perbesar {{ $item['judul'] }}"
                            class="relative w-full block overflow-hidden bg-canvas cursor-zoom-in shrink-0 focus:outline-none"
                        >
                            {{-- Wrapper Aspect Ratio Dinamis --}}
                            <div class="relative {{ $item['orientasi'] === 'portrait' ? 'aspect-[3/4]' : 'aspect-video' }} w-full">

                                <img
                                    src="{{ asset('images/sertifikat/' . $item['file']) }}"
                                    alt="{{ $item['judul'] }}"
                                    class="w-full h-full object-cover transition-transform duration-700 ease-smooth group-hover:scale-110"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >

                                {{-- Fallback Gambar Rusak --}}
                                <div class="hidden absolute inset-0 items-center justify-center bg-contrast/5">
                                    <svg class="w-12 h-12 text-contrast/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.5-6 3.5 4 3-3.5L20 16M4 6h16v14H4z"/>
                                    </svg>
                                </div>

                                {{-- Overlay Gradien Hitam --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>

                                {{-- Ikon Kaca Pembesar di Tengah --}}
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 transform translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                                    <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/40 text-white shadow-lg">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Badge Tahun --}}
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm border border-white/20 shadow-sm rounded-lg px-3 py-1.5 flex items-center gap-1.5 transition-transform duration-300 group-hover:scale-105">
                                <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-xs font-bold font-mono text-contrast">{{ $item['tahun'] }}</span>
                            </div>
                        </button>

                        {{-- Area Teks & Deskripsi (Fleksibel mengisi tinggi yang tersisa) --}}
                        <div class="flex-1 flex flex-col p-6 sm:p-7 z-10 bg-white">
                            <h3 class="text-base sm:text-lg font-bold text-contrast leading-snug mb-3 transition-colors duration-300 group-hover:text-primary line-clamp-2">
                                {{ $item['judul'] }}
                            </h3>
                            <p class="text-sm text-contrast/65 leading-relaxed flex-1 line-clamp-3">
                                {{ $item['deskripsi'] }}
                            </p>
                        </div>

                        {{-- LIGHTBOX (Overlay Zoom) --}}
                        <template x-teleport="body">
                            <div
                                x-show="zoomed"
                                x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 backdrop-blur-none"
                                x-transition:enter-end="opacity-100 backdrop-blur-md"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 backdrop-blur-md"
                                x-transition:leave-end="opacity-0 backdrop-blur-none"
                                @click="zoomed = false"
                                @keydown.escape.window="zoomed = false"
                                class="fixed inset-0 z-[100] bg-contrast/90 backdrop-blur-md flex flex-col items-center justify-center p-4 sm:p-8 md:p-12 cursor-zoom-out"
                            >
                                <button
                                    type="button"
                                    @click.stop="zoomed = false"
                                    aria-label="Tutup"
                                    class="absolute top-4 right-4 sm:top-8 sm:right-8 w-12 h-12 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-contrast transition-all duration-300"
                                >
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>

                                <div
                                    class="relative max-w-4xl w-full"
                                    x-transition:enter="transition ease-out duration-300 delay-100"
                                    x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                                >
                                    <img
                                        src="{{ asset('images/sertifikat/' . $item['file']) }}"
                                        alt="{{ $item['judul'] }}"
                                        class="w-full max-h-[70vh] object-contain rounded-xl shadow-2xl"
                                        @click.stop
                                    >

                                    <div class="mt-6 text-center max-w-2xl mx-auto px-4" @click.stop>
                                        <span class="inline-block bg-primary/20 text-primary-light border border-primary/30 rounded-full px-3 py-1 text-xs font-bold font-mono mb-3 text-white">
                                            TAHUN {{ $item['tahun'] }}
                                        </span>
                                        <h4 class="text-lg sm:text-xl font-bold text-white mb-2">{{ $item['judul'] }}</h4>
                                        <p class="text-sm sm:text-base text-white/70 leading-relaxed">{{ $item['deskripsi'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </template>

                    </div>
                @endforeach
            </div>


            {{-- MASONRY LAYOUT: Otomatis membagi rata tanpa celah kosong, bebas ganjil/genap --}}
            {{-- gunakan baris kode ini untuk otomatis membagi rata tanpa celah kosong, bebas ganjil/genap --}}
           {{--  <div class="columns-1 md:columns-2 lg:columns-3 gap-6 sm:gap-8 [column-fill:_balance] box-border-before">

                     @foreach ($penghargaan as $item)
                <div x-data="{ zoomed: false }"
                 class="break-inside-avoid mb-6 sm:mb-8 group flex flex-col bg-white rounded-3xl border border-contrast/10 overflow-hidden shadow-sm transition-all duration-500 hover:shadow-xl hover:shadow-primary/10 hover:border-primary/30 hover:-translate-y-2 relative w-full">

                     <div class="absolute top-0 left-0 w-full h-1 bg-primary origin-left scale-x-0 transition-transform duration-500 ease-out group-hover:scale-x-100 z-20"></div>

                <button
                     type="button"
                     @click="zoomed = true"
                     aria-label="Perbesar {{ $item['judul'] }}"
                     class="relative w-full block overflow-hidden bg-canvas cursor-zoom-in shrink-0 focus:outline-none"
                     >
                     <div class="relative {{ $item['orientasi'] === 'portrait' ? 'aspect-[3/4]' : 'aspect-video' }} w-full">
                        <img
                        src="{{ asset('images/sertifikat/' . $item['file']) }}"
                        alt="{{ $item['judul'] }}"
                        class="w-full h-full object-cover transition-transform duration-700 ease-smooth group-hover:scale-110"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                         >
                     </div>
                </button>

                <div class="p-6 sm:p-7 bg-white">
                     <h3 class="text-base sm:text-lg font-bold text-contrast leading-snug mb-3 transition-colors duration-300 group-hover:text-primary line-clamp-2">
                    {{ $item['judul'] }}
                    </h3>
                     <p class="text-sm text-contrast/65 leading-relaxed line-clamp-4">
                    {{ $item['deskripsi'] }}
                    </p>
                 </div>
            </div>
                     @endforeach
            </div>--}}

        </div>
    </section>

@endsection
