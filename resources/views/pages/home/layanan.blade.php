@php
    $iconPaths = [
        'clipboard' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 7h6m-6 4h6',
        'file'      => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'news'      => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM7 8h6M7 12h10M7 16h6',
        'message'   => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4-.8L3 20l1.3-3.9A7.93 7.93 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
    ];
@endphp

<section class="bg-base py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <h2 class="font-serif font-medium text-xl sm:text-2xl mb-8">Akses Cepat</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5">
            @foreach ($layanan as $item)
                <a href="{{ route($item['route']) }}"
                   class="group rounded-xl border border-contrast/10 bg-white/40 p-5 sm:p-6
                          transition-all duration-200 ease-smooth hover:border-secondary hover:-translate-y-1 hover:shadow-sm">
                    <div class="w-11 h-11 rounded-lg bg-primary/10 flex items-center justify-center
                                transition-colors duration-200 group-hover:bg-primary">
                        <svg class="w-5 h-5 text-primary transition-colors duration-200 group-hover:text-white"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                        </svg>
                    </div>
                    <p class="font-medium text-sm sm:text-base mt-4">{{ $item['judul'] }}</p>
                    <p class="text-xs sm:text-sm text-contrast/60 mt-1.5 leading-relaxed">{{ $item['deskripsi'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
