@php
    $iconPaths = [
        'ruler'    => 'M4 15l5-5m0 0l5-5m-5 5l5 5m-5-5l-5 5M3 21l3-3m0 0l3-3m9 3l3-3m-3 3l-3-3',
        'map'      => 'M9 20l-6-3V4l6 3m0 13l6-3m-6 3V7m6 10l6 3V7l-6-3m0 13V4m0 3L9 4',
        'pin'      => 'M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z M12 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z',
        'building' => 'M3 21h18M6 21V5a1 1 0 011-1h4a1 1 0 011 1v16M14 21V9a1 1 0 011-1h4a1 1 0 011 1v12M9 7h.01M9 11h.01M9 15h.01',
    ];
@endphp

<section class="bg-contrast py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <p class="font-mono text-xs text-secondary mb-6">Capaian pengukuran hingga saat ini</p>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($statistik as $item)
                <div class="rounded-xl bg-white/5 p-5 transition-colors duration-200 hover:bg-white/10">
                    <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                    </svg>
                    <p class="font-mono text-xl sm:text-2xl text-white mt-3">{{ $item['nilai'] }}</p>
                    <p class="text-xs sm:text-sm text-secondary mt-1 leading-relaxed">{{ $item['label'] }}</p>
                </div>
            @endforeach
        </div>

        <p class="text-[11px] text-white/30 mt-5">
            Angka bersifat ilustratif untuk kebutuhan rancangan tampilan, akan digantikan data resmi kantor.
        </p>
    </div>
</section>
