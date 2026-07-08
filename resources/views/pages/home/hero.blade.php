<section class="relative overflow-hidden min-h-[480px] sm:min-h-[520px] lg:min-h-[600px] flex items-start pt-24 sm:pt-28 lg:pt-36">

    {{-- Lapisan foto latar --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/hero/forest.jpg') }}"
            alt="Kawasan hutan di wilayah kerja BPKH Kota Palu"
            class="w-full h-full object-cover object-[center_65%] sm:object-[center_55%]"
            loading="eager"
        >
        {{-- Overlay gradasi gelap agar teks tetap terbaca di atas foto --}}
        <div class="absolute inset-0 bg-gradient-to-r from-contrast/95 via-contrast/70 to-contrast/30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-contrast/50 via-transparent to-transparent"></div>
    </div>

    {{-- Konten --}}
    <div class="relative mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 w-full">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 px-3 py-1.5 font-mono text-xs text-white">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                    <circle cx="12" cy="10" r="2.5"/>
                </svg>
                Wilayah kerja Sulawesi Tengah
            </span>

            <h1 class="font-serif font-medium text-2xl sm:text-3xl lg:text-5xl leading-tight mt-4 sm:mt-5 text-white">
                Batas yang pasti, untuk hutan yang lestari
            </h1>

            <p class="text-white/80 text-sm sm:text-base leading-relaxed mt-3 sm:mt-4 max-w-xl">
                Kami melaksanakan penataan batas, pengukuran, dan pemetaan kawasan hutan di Sulawesi Tengah
                dan sekitarnya, agar status dan luasan kawasan hutan memiliki kepastian hukum.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 mt-6 sm:mt-8">
                <a href="{{ route('kontak.janji-temu') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-lg bg-action px-6 py-3 text-sm font-medium text-contrast transition-all duration-200 ease-smooth hover:bg-action-dark hover:-translate-y-0.5">
                    Janji Temu Offline
                </a>
                <a href="{{ route('layanan.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-6 py-3 text-sm font-medium text-white transition-all duration-200 ease-smooth hover:border-action hover:text-action">
                    Ajukan Layanan
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
