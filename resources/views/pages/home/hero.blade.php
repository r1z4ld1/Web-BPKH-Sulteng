<section class="relative overflow-hidden bg-base">
    {{-- Ilustrasi kontur - disembunyikan di mobile agar tidak mengganggu keterbacaan --}}
    <svg class="hidden md:block absolute -right-8 -top-6 w-56 h-56 lg:w-72 lg:h-72 opacity-90" viewBox="0 0 260 260" fill="none" aria-hidden="true">
        <path d="M40 130 C 40 80, 90 40, 140 45 C 190 50, 220 90, 210 140 C 200 190, 150 215, 105 205 C 60 195, 40 175, 40 130 Z" stroke="#6E9B76" stroke-width="1.2"/>
        <path d="M70 130 C 70 102, 104 78, 136 81 C 168 84, 186 108, 180 136 C 174 164, 146 181, 118 175 C 90 169, 70 156, 70 130 Z" stroke="#6E9B76" stroke-width="1.2"/>
        <path d="M85 130 C 85 110, 112 94, 134 96 C 156 98, 170 114, 166 133 C 162 152, 142 165, 122 161 C 102 157, 85 145, 85 130 Z" stroke="#2F5D45" stroke-width="1.4"/>
        <circle cx="122" cy="128" r="4" fill="#8B5E34"/>
        <line x1="122" y1="128" x2="170" y2="90" stroke="#8B5E34" stroke-width="1" stroke-dasharray="3 3"/>
    </svg>

    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 pt-14 pb-16 sm:pt-20 sm:pb-20 lg:pt-28 lg:pb-24">
        <div class="max-w-2xl relative">
            <span class="inline-flex items-center gap-2 rounded-full bg-secondary/15 px-3 py-1.5 font-mono text-xs text-primary">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                    <circle cx="12" cy="10" r="2.5"/>
                </svg>
                Wilayah kerja Sulawesi Tengah
            </span>

            <h1 class="font-serif font-medium text-3xl sm:text-4xl lg:text-5xl leading-tight mt-5">
                Batas yang pasti, untuk hutan yang lestari
            </h1>

            <p class="text-contrast/70 text-base leading-relaxed mt-4 max-w-xl">
                Kami melaksanakan penataan batas, pengukuran, dan pemetaan kawasan hutan di Kota Palu
                dan sekitarnya, agar status dan luasan kawasan hutan memiliki kepastian hukum.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 mt-8">
                <a href="{{ route('profil.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-6 py-3 text-sm font-medium text-white
                          transition-all duration-200 ease-smooth hover:bg-primary-dark hover:-translate-y-0.5">
                    Lihat Profil Kantor
                </a>
                <a href="{{ route('layanan.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-lg border border-contrast/20 px-6 py-3 text-sm font-medium text-contrast
                          transition-all duration-200 ease-smooth hover:border-action hover:text-action">
                    Ajukan Layanan
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
