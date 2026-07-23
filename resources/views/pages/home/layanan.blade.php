@php
    $iconPaths = [
        'clipboard' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 7h6m-6 4h6',
        'file'      => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'news'      => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM7 8h6M7 12h10M7 16h6',
        'message'   => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4-.8L3 20l1.3-3.9A7.93 7.93 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
    ];
@endphp

<section class="bg-base py-16 sm:py-20 lg:py-24 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 relative z-10 ">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 sm:mb-12 gap-4">
            <div>
                <span class="inline-block text-primary font-bold text-xs tracking-widest uppercase mb-2">
                    Jalan Pintas
                </span>
                <h2 class="font-serif font-semibold text-2xl sm:text-3xl text-contrast">
                    Layanan Akses Cepat
                </h2>
            </div>
            <p class="text-sm text-contrast/60 max-w-xs sm:text-right">
                Pilih layanan di bawah ini untuk menuju ke halaman yang Anda butuhkan dengan cepat.
            </p>
        </div>

        {{-- Grid Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 ">
            @foreach ($layanan as $item)
                <a href="{{ route($item['route']) }}"
                   class="group relative flex flex-col h-full p-6 sm:p-7 rounded-2xl bg-white border border-contrast/5 shadow-sm
                          hover:shadow-xl hover:border-primary/20 hover:-translate-y-1.5 transition-all duration-300 ease-out overflow-hidden">

                    {{-- Dekorasi Latar Belakang Blur saat Hover (Mewah & Modern) --}}
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-primary/5 rounded-full blur-2xl
                                transition-transform duration-500 ease-out group-hover:scale-[2.5] group-hover:bg-primary/10"></div>

                    {{-- Ikon Utama & Ikon Panah --}}
                    <div class="flex justify-between items-start mb-8 relative z-10">
                        {{-- Ikon Layanan --}}
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center
                                    transition-all duration-300 ease-out group-hover:scale-110 group-hover:-rotate-3 group-hover:bg-primary group-hover:shadow-md">
                            <svg class="w-6 h-6 text-primary transition-colors duration-300 group-hover:text-white"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                            </svg>
                        </div>

                        {{-- Ikon Navigasi Panah (Kanan Atas) --}}
                        <div class="w-8 h-8 rounded-full border border-contrast/10 flex items-center justify-center bg-white/50
                                    transition-all duration-300 group-hover:bg-primary group-hover:border-primary group-hover:shadow-sm">
                            <svg class="w-3.5 h-3.5 text-contrast/30 transition-all duration-300 group-hover:text-white group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </div>
                    </div>

                    {{-- Konten Teks --}}
                    <div class="relative z-10 flex flex-col flex-grow">
                        <h3 class="font-semibold text-lg text-contrast mb-2 transition-colors duration-300 group-hover:text-primary">
                            {{ $item['judul'] }}
                        </h3>
                        <p class="text-sm text-contrast/60 leading-relaxed line-clamp-3">
                            {{ $item['deskripsi'] }}
                        </p>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>
