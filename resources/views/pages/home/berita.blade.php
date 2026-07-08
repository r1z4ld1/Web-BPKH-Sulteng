<section class="bg-canvas py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <div class="flex items-baseline justify-between mb-8">
            <h2 class="font-serif font-medium text-xl sm:text-2xl">Berita Terbaru</h2>
            <a href="{{ route('berita.index') }}"
               class="text-sm font-medium text-primary hover:text-action transition-colors duration-200">
                Lihat semua →
            </a>
        </div>

        @if (count($berita) > 0)
            @php
                $unggulan = $berita[0];
                $lainnya  = array_slice($berita, 1, 3); // maksimal 3 item di daftar samping
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">

                {{-- Berita Unggulan --}}
                <article class="lg:col-span-3 rounded-xl border border-contrast/10 overflow-hidden group cursor-pointer
                                 transition-all duration-200 ease-smooth hover:border-secondary hover:-translate-y-1">
                    <div class="h-52 sm:h-64 lg:h-72 bg-secondary/15 flex items-center justify-center">
                        <svg class="w-10 h-10 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="4" width="18" height="16" rx="2"/>
                            <path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-2.5">
                            <span class="font-mono text-[11px] text-highlight">{{ $unggulan['tanggal'] }}</span>
                            <span class="w-1 h-1 rounded-full bg-contrast/20"></span>
                            <span class="text-[11px] text-contrast/50">{{ $unggulan['kategori'] }}</span>
                        </div>
                        <p class="font-serif font-medium text-lg sm:text-xl leading-snug
                                  transition-colors duration-200 group-hover:text-primary">
                            {{ $unggulan['judul'] }}
                        </p>
                    </div>
                </article>

                {{-- Daftar Berita Lainnya --}}
                <div class="lg:col-span-2 flex flex-col rounded-xl border border-contrast/10 divide-y divide-contrast/10 overflow-hidden">
                    @forelse ($lainnya as $item)
                        <article class="flex gap-4 p-4 sm:p-5 group cursor-pointer transition-colors duration-200 hover:bg-white">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-lg bg-secondary/15 flex items-center justify-center">
                                <svg class="w-6 h-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                                    <path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-mono text-[10.5px] text-highlight">{{ $item['tanggal'] }}</span>
                                    <span class="w-1 h-1 rounded-full bg-contrast/20 shrink-0"></span>
                                    <span class="text-[10.5px] text-contrast/50 truncate">{{ $item['kategori'] }}</span>
                                </div>
                                <p class="text-sm font-medium leading-snug line-clamp-2
                                          transition-colors duration-200 group-hover:text-primary">
                                    {{ $item['judul'] }}
                                </p>
                            </div>
                        </article>
                    @empty
                        <div class="p-6 text-sm text-contrast/50 flex items-center justify-center h-full">
                            Belum ada berita lain.
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
    </div>
</section>
