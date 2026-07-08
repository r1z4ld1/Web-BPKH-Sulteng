@php
    $warnaMap = [
        'primary'   => '#2F5D45',
        'secondary' => '#6E9B76',
        'highlight' => '#8B5E34',
        'action'    => '#C89B3C',
    ];

    $iconPaths = [
        'ruler'    => 'M4 15l5-5m0 0l5-5m-5 5l5 5m-5-5l-5 5M3 21l3-3m0 0l3-3m9 3l3-3m-3 3l-3-3',
        'pin'      => 'M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z M12 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z',
        'building' => 'M3 21h18M6 21V5a1 1 0 011-1h4a1 1 0 011 1v16M14 21V9a1 1 0 011-1h4a1 1 0 011 1v12M9 7h.01M9 11h.01M9 15h.01',
    ];
@endphp

<section class="bg-contrast py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">

        {{-- Header + total --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
            <div>
                <p class="font-mono text-xs text-secondary mb-2">Data kawasan hutan</p>
                <h2 class="font-serif font-medium text-xl sm:text-2xl text-white">Kawasan Hutan Sulawesi Tengah</h2>
            </div>

            <div class="flex items-center gap-4">
                <div>
                    <p class="font-mono text-3xl sm:text-4xl text-white leading-none">{{ $kawasanHutan['total_ha'] }}<span class="text-base text-secondary ml-1">ha</span></p>
                    <p class="text-xs text-secondary mt-1">Total kawasan hutan wilayah kerja</p>
                </div>
                <a href="{{ route('layanan.peta') }}"
                   class="hidden sm:inline-flex items-center gap-2 rounded-lg border border-white/20 px-5 py-2.5 text-sm font-medium text-white
                          transition-all duration-200 ease-smooth hover:border-action hover:text-action shrink-0">
                    Lihat Peta Interaktif
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Breakdown per fungsi kawasan --}}
        <div class="space-y-4 mb-10">
            @foreach ($kawasanHutan['rincian'] as $item)
                <div>
                    <div class="flex items-center justify-between text-sm mb-1.5">
                        <span class="text-white/90">{{ $item['label'] }}</span>
                        <span class="font-mono text-secondary shrink-0 ml-3">{{ $item['ha'] }} ha · {{ $item['persen'] }}%</span>
                    </div>
                    <div class="h-2 rounded-full bg-white/10 overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-700 ease-smooth"
                             style="width: {{ $item['persen'] }}%; background-color: {{ $warnaMap[$item['warna']] }};"></div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CTA mobile (karena tombol desktop disembunyikan di layar kecil) --}}
        <a href="{{ route('layanan.peta') }}"
           class="sm:hidden inline-flex items-center justify-center gap-2 w-full rounded-lg border border-white/20 px-5 py-3 text-sm font-medium text-white mb-10">
            Lihat Peta Interaktif
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
            </svg>
        </a>

        {{-- Stat ringkas tambahan --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8 border-t border-white/10">
            @foreach ($statistikCards as $item)
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-white/5 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-mono text-lg text-white leading-none">{{ $item['nilai'] }}</p>
                        <p class="text-xs text-secondary mt-1">{{ $item['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-[11px] text-white/30 mt-6">
            {{ $kawasanHutan['dasar_hukum'] }}. Seluruh angka pada bagian ini bersifat ilustratif untuk kebutuhan rancangan tampilan.
        </p>
    </div>
</section>
