<section class="bg-base py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <div class="flex items-baseline justify-between mb-8">
            <h2 class="font-serif font-medium text-xl sm:text-2xl">Berita Terbaru</h2>
           <a href="{{ route('berita.index') }}"
               class="text-sm font-medium text-primary hover:text-action transition-colors duration-200">
                Lihat semua →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
            @foreach ($berita as $item)
                <article class="rounded-xl border border-contrast/10 overflow-hidden group cursor-pointer
                                 transition-all duration-200 ease-smooth hover:border-secondary hover:-translate-y-1">
                    <div class="h-36 bg-secondary/15 flex items-center justify-center">
                        <svg class="w-8 h-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="4" width="18" height="16" rx="2"/>
                            <path stroke-linecap="round" d="m3 15 5-5 4 4 6-6 3 3"/>
                        </svg>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="font-mono text-[11px] text-highlight">{{ $item['tanggal'] }}</span>
                            <span class="w-1 h-1 rounded-full bg-contrast/20"></span>
                            <span class="text-[11px] text-contrast/50">{{ $item['kategori'] }}</span>
                        </div>
                        <p class="font-medium text-sm sm:text-base leading-snug
                                  transition-colors duration-200 group-hover:text-primary">
                            {{ $item['judul'] }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
