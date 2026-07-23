@extends('layouts.app')

@section('content')

    <x-page-header
        title="Berita & Publikasi"
        :breadcrumb="[
            ['label' => 'Berita', 'url' => route('berita.index')],
        ]"
    />

    <section class="bg-canvas py-16 sm:py-20 lg:py-24 relative overflow-hidden" x-data="{ filter: 'Semua', search: '' }">
        {{-- Elemen Dekoratif Background --}}
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-72 h-72 bg-highlight/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 relative z-10">

            {{-- Header & Deskripsi Singkat --}}
            <div class="max-w-2xl mb-10 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-serif font-semibold text-contrast mb-4">Eksplorasi Kabar Terbaru</h2>
                <p class="text-sm sm:text-base text-contrast/60 leading-relaxed">
                    Temukan informasi terkini, kegiatan, dan publikasi resmi dari Balai Pemantapan Kawasan Hutan Kota Palu. Gunakan fitur pencarian atau filter untuk menemukan topik spesifik.
                </p>
            </div>

            {{-- Section Filter & Pencarian --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-12 bg-white p-2 sm:p-3 rounded-2xl sm:rounded-full shadow-sm border border-contrast/5">

                {{-- Kategori Filter (Bisa discroll menyamping di Mobile) --}}
                <div class="flex-1 w-full overflow-x-auto hide-scrollbar">
                    <div class="flex items-center gap-2 px-2 pb-2 lg:pb-0 min-w-max">
                        @foreach ($kategori as $item)
                            <button @click="filter = '{{ $item }}'" type="button"
                                    class="rounded-full px-5 py-2.5 text-xs sm:text-sm font-medium transition-all duration-300 ease-out whitespace-nowrap"
                                    :class="filter === '{{ $item }}'
                                        ? 'bg-primary text-white shadow-md shadow-primary/20 scale-105'
                                        : 'bg-transparent text-contrast/60 hover:bg-contrast/5 hover:text-contrast'">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Kolom Pencarian --}}
                <div class="relative w-full lg:w-80 shrink-0 px-2 lg:px-0">
                    <div class="absolute inset-y-0 left-4 lg:left-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-contrast/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/><path stroke-linecap="round" d="m20 20-3.5-3.5"/>
                        </svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Cari judul berita..."
                           class="w-full rounded-full border border-contrast/15 bg-canvas/50 pl-11 pr-5 py-2.5 text-sm text-contrast placeholder:text-contrast/40
                                  focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary focus:bg-white transition-all duration-300">
                </div>
            </div>

            {{-- Grid Daftar Berita --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($berita as $item)
                    <a href="{{ route('berita.show', $item['slug']) }}"
                       x-show="(filter === 'Semua' || filter === '{{ $item['kategori'] }}') && (search === '' || '{{ Str::lower($item['judul']) }}'.includes(search.toLowerCase()))"
                       x-transition:enter="transition ease-out duration-300"
                       x-transition:enter-start="opacity-0 translate-y-4"
                       x-transition:enter-end="opacity-100 translate-y-0"
                       class="group flex flex-col h-full rounded-2xl bg-white border border-contrast/5 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 overflow-hidden">

                        {{-- Thumbnail Image --}}
                        <div class="relative h-56 sm:h-60 w-full bg-secondary/10 overflow-hidden shrink-0">
                            <img src="{{ asset('images/berita/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                 loading="lazy"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                            {{-- Placeholder jika gambar error --}}
                            <div class="hidden absolute inset-0 items-center justify-center bg-secondary/10">
                                <svg class="w-10 h-10 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="4" width="18" height="16" rx="2"/><path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                                </svg>
                            </div>

                            {{-- Kategori Badge Over Image --}}
                            <div class="absolute top-4 left-4 z-10">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-white/90 backdrop-blur text-[11px] font-bold text-primary tracking-wide shadow-sm">
                                    {{ $item['kategori'] }}
                                </span>
                            </div>

                            {{-- Overlay Gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        {{-- Konten Teks --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-4 h-4 text-highlight" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="font-mono text-xs font-medium text-contrast/50">{{ $item['tanggal'] }}</span>
                            </div>

                            <h3 class="font-serif font-semibold text-lg sm:text-xl leading-snug text-contrast mb-3 group-hover:text-primary transition-colors duration-300">
                                {{ $item['judul'] }}
                            </h3>

                            <p class="text-sm text-contrast/60 leading-relaxed line-clamp-3 mb-6">
                                {{ $item['excerpt'] }}
                            </p>

                            {{-- Footer Card (Baca Selengkapnya) --}}
                            <div class="mt-auto pt-4 border-t border-contrast/5 flex items-center justify-between">
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-primary group-hover:text-action transition-colors duration-300">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Desain Pagination (Navigasi Next/Prev) --}}
            <div class="mt-16 pt-8 border-t border-contrast/10 flex flex-col sm:flex-row items-center justify-between gap-6">
                {{--bagian kode jika ingin menambahkan pagination, bisa menggunakan kode berikut ini. Namun, pastikan untuk menyesuaikan logika backend untuk mendukung pagination.--}}
                {{--<div class="mt-16 pt-8 border-t border-contrast/10">
                    {{ $berita->links() }}
                </div>--}}

                {{-- Info Angka --}}
                <div class="text-sm text-contrast/60 text-center sm:text-left order-2 sm:order-1">
                    Menampilkan <span class="font-semibold text-contrast">1</span> hingga <span class="font-semibold text-contrast">10</span> dari <span class="font-semibold text-contrast">45</span> berita
                </div>

                {{-- Tombol Navigasi --}}
                <div class="flex items-center gap-2 order-1 sm:order-2 w-full sm:w-auto justify-between sm:justify-end">

                    {{-- Tombol Prev --}}
                    <button class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-contrast/15 bg-white text-sm font-medium text-contrast/70 hover:bg-contrast/5 hover:text-contrast transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Sebelumnya
                    </button>

                    {{-- Indikator Angka (Opsional untuk Desktop) --}}
                    <div class="hidden md:flex items-center gap-1 mx-2">
                        <button class="w-10 h-10 rounded-lg bg-primary text-white text-sm font-semibold flex items-center justify-center shadow-md">1</button>
                        <button class="w-10 h-10 rounded-lg bg-transparent text-contrast/60 hover:bg-contrast/5 text-sm font-medium flex items-center justify-center transition-colors">2</button>
                        <button class="w-10 h-10 rounded-lg bg-transparent text-contrast/60 hover:bg-contrast/5 text-sm font-medium flex items-center justify-center transition-colors">3</button>
                        <span class="px-2 text-contrast/40">...</span>
                        <button class="w-10 h-10 rounded-lg bg-transparent text-contrast/60 hover:bg-contrast/5 text-sm font-medium flex items-center justify-center transition-colors">5</button>
                    </div>

                    {{-- Tombol Next --}}
                    <button class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-primary/20 bg-primary/5 text-sm font-semibold text-primary hover:bg-primary hover:text-white transition-all duration-200 shadow-sm">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                </div>
            </div>

        </div>
    </section>

    {{-- Tambahan CSS khusus jika scrollbar mengganggu di mobile --}}
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

@endsection
