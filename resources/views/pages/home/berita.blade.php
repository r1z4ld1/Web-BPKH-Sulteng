<section class="bg-canvas py-16 sm:py-20 lg:py-24 relative overflow-hidden">
    {{-- Elemen Dekoratif --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute -left-24 top-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute -right-24 bottom-10 w-72 h-72 bg-highlight/5 rounded-full blur-3xl -z-10"></div>

    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 z-10 relative">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
            <div>
                <p class="inline-flex items-center gap-2 font-mono text-xs font-semibold text-primary uppercase tracking-widest mb-2">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Informasi Terkini
                </p>
                <h2 class="font-serif font-medium text-2xl sm:text-3xl text-contrast">Berita & Publikasi</h2>
            </div>
            <a href="{{ route('berita.index') }}"
               class="group inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-action transition-colors duration-300">
                Lihat semua berita
                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        @if (count($berita) > 0)
            @php
                $unggulan = $berita[0];
                $lainnya  = array_slice($berita, 1, 3);
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">

                {{-- Berita Unggulan (Kiri/Atas) --}}
                <a href="{{ route('berita.show', $unggulan['slug']) }}"
                   class="lg:col-span-3 group relative rounded-2xl bg-white border border-contrast/5 shadow-sm hover:shadow-xl transition-all duration-300 ease-out flex flex-col overflow-hidden hover:-translate-y-1">

                    {{-- Badge Kategori --}}
                    <div class="absolute top-4 left-4 z-20">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-white/90 backdrop-blur-md text-[11px] font-bold text-primary tracking-wide shadow-sm">
                            {{ $unggulan['kategori'] }}
                        </span>
                    </div>

                    {{-- Image Container --}}
                    <div class="relative h-60 sm:h-72 lg:h-80 w-full bg-secondary/10 overflow-hidden">
                        <img src="{{ asset('images/berita/' . $unggulan['gambar']) }}" alt="{{ $unggulan['judul'] }}"
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                             loading="lazy"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                        {{-- Placeholder jika gambar gagal dimuat --}}
                        <div class="hidden absolute inset-0 items-center justify-center bg-secondary/15">
                            <svg class="w-12 h-12 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                            </svg>
                        </div>

                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>
                    </div>

                    {{-- Konten Teks --}}
                    <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-4 h-4 text-highlight" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="font-mono text-[12px] font-medium text-contrast/60">{{ $unggulan['tanggal'] }}</span>
                            </div>
                            <h3 class="font-serif font-semibold text-xl sm:text-2xl text-contrast leading-tight group-hover:text-primary transition-colors duration-300">
                                {{ $unggulan['judul'] }}
                            </h3>
                            <p class="mt-4 text-sm text-contrast/70 line-clamp-2">
                                {{ $unggulan['excerpt'] }}
                            </p>
                        </div>

                        {{-- Tombol/Indikator Baca Selengkapnya --}}
                        <div class="mt-6 flex items-center pt-4 border-t border-contrast/5">
                            <span class="inline-flex items-center gap-2 text-sm font-semibold text-primary group-hover:text-action transition-colors duration-300">
                                Baca selengkapnya
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                {{-- Daftar Berita Lainnya (Kanan/Bawah) --}}
                <div class="lg:col-span-2 flex flex-col gap-4">
                    @forelse ($lainnya as $item)
                        <a href="{{ route('berita.show', $item['slug']) }}"
                           class="group flex flex-col sm:flex-row items-center gap-5 p-4 rounded-2xl bg-white border border-contrast/5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/20 hover:-translate-y-0.5">

                            {{-- Thumbnail Container --}}
                            <div class="relative w-full sm:w-28 h-40 sm:h-32 shrink-0 rounded-xl bg-secondary/10 overflow-hidden">
                                <img src="{{ asset('images/berita/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                     loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <div class="hidden absolute inset-0 items-center justify-center bg-secondary/15">
                                    <svg class="w-8 h-8 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <rect x="3" y="4" width="18" height="16" rx="2"/>
                                        <path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Konten Teks --}}
                            <div class="flex-grow min-w-0 py-1 flex flex-col justify-between w-full h-full">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="inline-block px-2 py-1 rounded bg-highlight/10 text-[10px] font-bold text-highlight uppercase tracking-wider">
                                            {{ $item['kategori'] }}
                                        </span>
                                    </div>
                                    <h4 class="text-sm sm:text-base font-medium text-contrast leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-300 mb-2">
                                        {{ $item['judul'] }}
                                    </h4>
                                </div>

                                {{-- Meta Tanggal & Baca Selengkapnya --}}
                                <div class="flex items-center justify-between mt-3 sm:mt-auto">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-contrast/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-mono text-[11px] text-contrast/50">{{ $item['tanggal'] }}</span>
                                    </div>
                                    <span class="inline-flex items-center text-[11px] sm:text-xs font-semibold text-primary group-hover:text-action transition-colors duration-300">
                                        Baca
                                        <svg class="w-3 h-3 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="flex flex-col items-center justify-center h-full p-8 rounded-2xl bg-white border border-dashed border-contrast/20 text-center">
                            <svg class="w-12 h-12 text-contrast/20 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20" />
                            </svg>
                            <p class="text-sm text-contrast/50 font-medium">Belum ada berita lainnya saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @else
            {{-- State Kosong Jika Tidak Ada Berita Sama Sekali --}}
            <div class="flex flex-col items-center justify-center p-12 rounded-3xl bg-white border border-contrast/10 shadow-sm text-center">
                <div class="w-16 h-16 rounded-full bg-canvas flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-contrast/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-contrast mb-2">Belum Ada Publikasi</h3>
                <p class="text-sm text-contrast/60 max-w-sm">Saat ini belum ada berita atau informasi terbaru yang diterbitkan. Silakan periksa kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
