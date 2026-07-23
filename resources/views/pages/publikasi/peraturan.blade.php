@extends('layouts.app')

@section('content')

    <x-page-header
        title="Peraturan"
        :breadcrumb="[
            ['label' => 'Publikasi', 'url' => route('publikasi.peraturan')],
            ['label' => 'Peraturan', 'url' => route('publikasi.peraturan')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-20 font-sans" x-data="{ filter: 'Semua', search: '' }">
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">

            {{-- Header Teks --}}
            <div class="mb-10 lg:mb-12 text-center sm:text-left">
                <h2 class="text-2xl sm:text-3xl font-serif text-contrast mb-4 tracking-tight">Kumpulan Peraturan</h2>
                <p class="text-sm sm:text-base text-contrast/70 leading-relaxed max-w-2xl mx-auto sm:mx-0">
                    Kumpulan peraturan perundang-undangan dan kebijakan yang menjadi dasar pelaksanaan
                    tugas dan fungsi Balai Pemantapan Kawasan Hutan Wilayah XVI Palu.
                </p>
            </div>

            {{-- CONTROL PANEL: Pencarian & Filter (Sticky style) --}}
            <div class="bg-white rounded-2xl shadow-sm border border-contrast/10 p-5 sm:p-6 mb-10">

                {{-- Pencarian --}}
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-contrast/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m20 20-3.5-3.5"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Ketik judul, nomor, atau kata kunci peraturan..."
                        class="block w-full rounded-xl border border-contrast/15 bg-canvas/50 pl-12 pr-12 py-3.5 text-sm sm:text-base text-contrast
                               focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-300"
                    >
                    {{-- Tombol Clear Pencarian (Muncul hanya jika ada teks) --}}
                    <button
                        x-show="search.length > 0"
                        @click="search = ''"
                        x-transition.opacity
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-contrast/40 hover:text-action transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Filter Kategori (Scrollable di Mobile) --}}
                <div class="flex items-center gap-3 overflow-x-auto pb-2 sm:pb-0 hide-scrollbar snap-x">
                    <span class="text-xs font-bold uppercase tracking-widest text-contrast/40 shrink-0 mr-2 hidden sm:block">Kategori:</span>
                    @foreach ($kategori as $item)
                        <button
                            @click="filter = '{{ $item }}'"
                            type="button"
                            class="snap-start shrink-0 rounded-xl px-5 py-2 text-sm font-medium transition-all duration-300 ease-smooth"
                            :class="filter === '{{ $item }}'
                                ? 'bg-primary text-white shadow-md shadow-primary/20 scale-105'
                                : 'bg-canvas border border-contrast/10 text-contrast/60 hover:border-primary/30 hover:text-primary hover:bg-white'"
                        >
                            {{ $item }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- DAFTAR PERATURAN --}}
            <div class="space-y-4 sm:space-y-5 relative">
                @foreach ($peraturan as $item)
                    <div
                        x-show="(filter === 'Semua' || filter === '{{ $item['kategori'] }}') &&
                                (search === '' || '{{ Str::lower($item['judul'] . ' ' . $item['nomor']) }}'.includes(search.toLowerCase()))"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="group relative flex flex-col sm:flex-row sm:items-center gap-5 overflow-hidden rounded-2xl border border-contrast/10 bg-white p-5 sm:p-6
                               transition-all duration-500 ease-smooth hover:shadow-xl hover:shadow-primary/5 hover:border-transparent"
                    >
                        {{-- Aksen Garis Kiri yang Tumbuh Ke Bawah Saat Hover --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary origin-top scale-y-0 transition-transform duration-500 ease-out group-hover:scale-y-100"></div>

                        {{-- Ikon Dokumen (Animasi Rotasi & Transisi Warna) --}}
                        <div class="relative w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center shrink-0
                                    transition-all duration-500 group-hover:bg-primary group-hover:shadow-md group-hover:shadow-primary/40">
                            <svg class="w-6 h-6 text-primary transition-all duration-500 group-hover:text-white group-hover:scale-110 group-hover:-rotate-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        {{-- Metadata & Judul Dokumen --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="inline-flex items-center rounded-lg bg-highlight/10 px-2.5 py-1 text-[11px] font-bold text-highlight font-mono border border-highlight/20 tracking-wide">
                                    {{ $item['nomor'] }}
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-contrast/20 shrink-0"></span>
                                <span class="text-xs font-semibold uppercase tracking-wider text-contrast/50">
                                    {{ $item['kategori'] }}
                                </span>
                            </div>
                            <h3 class="text-base sm:text-lg font-bold text-contrast leading-snug transition-colors duration-300 group-hover:text-primary">
                                {{ $item['judul'] }}
                            </h3>
                        </div>

                        {{-- Tombol Aksi Unduh --}}
                        <div class="mt-2 sm:mt-0 pt-4 sm:pt-0 border-t border-contrast/5 sm:border-t-0 shrink-0">
                            <a href="{{ asset('documents/peraturan/' . $item['file']) }}"
                               target="_blank" rel="noopener"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-canvas px-5 py-2.5 text-sm font-bold text-contrast transition-all duration-300
                                      hover:bg-primary hover:text-white hover:shadow-md hover:-translate-y-1">
                                Unduh PDF
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- Status Jika Pencarian Tidak Ditemukan --}}
                <div x-show="!Array.from($el.parentElement.children).some(el => el.style.display !== 'none' && el.tagName === 'DIV')"
                     style="display: none;"
                     class="py-12 text-center rounded-2xl border-2 border-dashed border-contrast/10 bg-white">
                    <svg class="w-12 h-12 text-contrast/20 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-contrast/60 text-base font-medium">Peraturan tidak ditemukan.</p>
                    <p class="text-sm text-contrast/40 mt-1">Coba gunakan kata kunci atau nomor yang berbeda.</p>
                </div>
            </div>

            {{-- Footer Catatan --}}
            <div class="mt-12 flex items-start gap-3 p-4 rounded-xl bg-contrast/5 border border-contrast/10">
                <svg class="w-5 h-5 text-contrast/40 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-xs sm:text-sm text-contrast/60 leading-relaxed">
                    Daftar peraturan pada halaman ini diperbarui secara berkala oleh admin. Jika Anda membutuhkan dokumen regulasi spesifik yang belum tersedia, silakan menghubungi layanan PPID kami.
                </p>
            </div>

        </div>
    </section>

    <style>
        /* CSS Tambahan untuk menyembunyikan scrollbar di filter kategori mobile */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
