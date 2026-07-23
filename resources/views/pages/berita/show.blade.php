@extends('layouts.app')

@section('content')

    <x-page-header
        :title="$berita['judul']"
        :breadcrumb="[
            ['label' => 'Berita', 'url' => route('berita.index')],
            ['label' => Str::limit($berita['judul'], 30), 'url' => route('berita.show', $berita['slug'])],
        ]"
    />

    {{-- Artikel Wrapper dengan AlpineJS untuk Reading Progress Bar --}}
    <article class="bg-canvas relative"
             x-data="{ scrollProgress: 0 }"
             @scroll.window="scrollProgress = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100">

        {{-- Reading Progress Bar (Sticky di atas layar saat discroll) --}}
        <div class="fixed top-0 left-0 h-1.5 bg-primary z-50 transition-all duration-150 ease-out rounded-r-full"
             :style="'width: ' + scrollProgress + '%'"></div>

        <div class="py-12 sm:py-16 lg:py-20 mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">

            {{-- Meta Info (Gaya Editorial Modern) --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-10 pb-8 border-b border-contrast/10">
                <div class="flex items-center gap-4">
                    {{-- Avatar Inisial Penulis --}}
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-highlight flex items-center justify-center text-white font-serif font-bold text-lg shadow-sm">
                        {{ strtoupper(substr($berita['penulis'], 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-contrast mb-1">Ditulis oleh {{ $berita['penulis'] }}</p>
                        <div class="flex items-center gap-2 font-mono text-[11px] sm:text-xs text-contrast/50">
                            <span>{{ $berita['tanggal'] }}</span>
                            <span class="w-1 h-1 rounded-full bg-contrast/30"></span>
                            <span>{{ $berita['waktu_baca'] }} membaca</span>
                        </div>
                    </div>
                </div>

                {{-- Badge Kategori --}}
                <div>
                    <span class="inline-flex items-center rounded-full bg-primary/10 border border-primary/20 text-primary px-4 py-1.5 text-xs font-semibold tracking-wide uppercase shadow-sm">
                        {{ $berita['kategori'] }}
                    </span>
                </div>
            </div>

            {{-- Featured Image yang Immersive --}}
            <div class="relative rounded-2xl overflow-hidden bg-secondary/10 mb-12 shadow-lg group aspect-[16/9] md:aspect-[21/9]">
                <img src="{{ asset('images/berita/' . $berita['gambar']) }}" alt="{{ $berita['judul'] }}"
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                {{-- Fallback Image --}}
                <div class="hidden absolute inset-0 items-center justify-center bg-secondary/10">
                    <svg class="w-12 h-12 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                        <rect x="3" y="4" width="18" height="16" rx="2"/><path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                    </svg>
                </div>
            </div>

            {{-- Area Konten Utama (Dibatasi lebarnya max-w-2xl agar mata tidak lelah) --}}
            <div class="mx-auto max-w-2xl">

                {{-- Isi berita dengan Tipografi yang memanjakan mata --}}
                <div class="space-y-6 sm:space-y-8 mb-12 text-[16px] sm:text-[18px] text-contrast/80 leading-[1.8] font-sans">
                    @foreach ($berita['konten'] as $index => $paragraf)
                        @if($index === 0)
                            {{-- Paragraf Pertama (Lead) dibuat lebih besar dan tebal untuk memancing minat --}}
                            <p class="text-lg sm:text-xl font-medium text-contrast leading-relaxed mb-8">
                                {{ $paragraf }}
                            </p>
                        @else
                            {{-- Paragraf biasa --}}
                            <p class="text-justify sm:text-left">{{ $paragraf }}</p>
                        @endif
                    @endforeach
                </div>

                {{-- Tags --}}
                <div class="flex flex-wrap gap-2.5 mb-12">
                    <span class="text-sm font-medium text-contrast/60 mr-2 flex items-center">Topik:</span>
                    @foreach ($berita['tag'] as $tag)
                        <span class="rounded-lg bg-contrast/5 hover:bg-primary hover:text-white px-3 py-1.5 text-xs font-medium text-contrast/70 transition-colors duration-300 cursor-default">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>

                {{-- Box Bagikan Artikel (Dipercantik) --}}
                <div x-data="{ copied: false, copyLink() { navigator.clipboard.writeText(window.location.href); this.copied = true; setTimeout(() => this.copied = false, 2500) } }"
                     class="flex flex-col sm:flex-row items-center justify-between gap-6 p-6 rounded-2xl bg-gradient-to-r from-primary/5 to-transparent border border-primary/10 mb-16">

                    <div class="text-center sm:text-left">
                        <h4 class="font-semibold text-contrast mb-1">Bagikan informasi ini</h4>
                        <p class="text-xs sm:text-sm text-contrast/60">Bantu sebarluaskan kabar baik ini ke rekan Anda.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        {{-- WhatsApp --}}
                        <a href="https://wa.me/?text={{ urlencode($berita['judul'] . ' - ' . request()->url()) }}" target="_blank" rel="noopener"
                           class="w-11 h-11 rounded-full bg-white border border-contrast/10 flex items-center justify-center hover:bg-[#25D366] hover:border-transparent group transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                            <svg class="w-5 h-5 text-contrast/60 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.847 9.847 0 0012.04 2z"/>
                            </svg>
                        </a>
                        {{-- Facebook --}}
                        <a href="https://web.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener"
                           class="w-11 h-11 rounded-full bg-white border border-contrast/10 flex items-center justify-center hover:bg-[#1877F2] hover:border-transparent group transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                            <svg class="w-5 h-5 text-contrast/60 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 22v-8h3l1-4h-4V7.5c0-1.2.4-2 2.1-2H17V2.1C16.6 2 15.5 2 14.2 2 11.5 2 9.7 3.7 9.7 6.6V10H7v4h2.7v8h3.3z"/>
                            </svg>
                        </a>
                        {{-- Salin Link --}}
                        <div class="relative">
                            <button @click="copyLink()" type="button"
                                    class="w-11 h-11 rounded-full bg-white border border-contrast/10 flex items-center justify-center hover:bg-contrast group transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1">
                                <svg x-show="!copied" class="w-5 h-5 text-contrast/60 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757M10.81 15.312a4.5 4.5 0 01-1.242-7.244l4.5-4.5a4.5 4.5 0 016.364 6.364l-1.757 1.757"/>
                                </svg>
                                <svg x-show="copied" x-cloak class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </button>
                            <span x-show="copied" x-cloak x-transition
                                  class="absolute -top-10 left-1/2 -translate-x-1/2 bg-contrast text-white text-[10px] font-semibold py-1 px-2 rounded whitespace-nowrap">
                                Link disalin!
                            </span>
                        </div>
                    </div>
                </div>

            </div> {{-- End of max-w-2xl --}}

            {{-- Section Berita Terkait --}}
            @if (count($terkait) > 0)
                <div class="pt-12 border-t border-contrast/10">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="font-serif font-semibold text-2xl text-contrast">Baca Selanjutnya</h3>
                        <a href="{{ route('berita.index') }}" class="text-sm font-medium text-primary hover:text-action transition-colors hidden sm:block">Lihat semua berita &rarr;</a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($terkait as $item)
                            <a href="{{ route('berita.show', $item['slug']) }}"
                               class="group flex flex-col h-full rounded-2xl bg-white border border-contrast/5 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 hover:-translate-y-1 overflow-hidden">

                                <div class="relative h-40 bg-secondary/10 overflow-hidden shrink-0">
                                    <img src="{{ asset('images/berita/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                         class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                         onerror="this.style.display='none';">

                                    {{-- Kategori Overlay --}}
                                    <div class="absolute top-3 left-3">
                                        <span class="px-2.5 py-1 rounded-md bg-white/90 backdrop-blur text-[10px] font-bold text-primary shadow-sm">
                                            {{ $item['kategori'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5 flex flex-col flex-grow">
                                    <span class="font-mono text-[11px] text-highlight mb-2">{{ $item['tanggal'] }}</span>
                                    <h4 class="text-base font-semibold text-contrast leading-snug group-hover:text-primary transition-colors duration-200 line-clamp-3">
                                        {{ $item['judul'] }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    {{-- Tombol lihat semua untuk mobile --}}
                    <div class="mt-6 text-center sm:hidden">
                        <a href="{{ route('berita.index') }}" class="inline-block rounded-full bg-primary/10 text-primary px-6 py-2.5 text-sm font-semibold">
                            Lihat semua berita
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </article>

@endsection
