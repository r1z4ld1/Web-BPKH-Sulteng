<section class="relative overflow-hidden min-h-[480px] sm:min-h-[440px] lg:min-h-[400px] flex items-start pt-24 sm:pt-32 lg:pt-20">

    {{-- 1. LAPISAN FOTO LATAR & OVERLAY --}}
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('images/hero/forest.jpg') }}"
            alt="Kawasan hutan di wilayah kerja BPKH Kota Palu"
            class="w-full h-full object-cover object-[center_65%] sm:object-[center_55%]"
            loading="eager"
        >
        {{-- Overlay gradasi gelap menggunakan Hijau Tinta Gelap (#16241C) untuk kekuatan kontras teks --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#16241C]/95 via-[#16241C]/80 to-[#16241C]/40 md:to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#16241C]/70 via-transparent to-transparent"></div>
    </div>

   {{-- 2. LAPISAN GARIS KONTUR TOPOGRAFI (DIAGONAL CORNER-TO-CORNER) --}}
    {{-- Mengisi persis setengah area layar (Segitiga Sudut Kanan Atas -> Kiri Bawah) --}}
    <div class="absolute inset-0 pointer-events-none z-10 opacity-35 md:opacity-50 lg:opacity-65" aria-hidden="true">

        {{-- preserveAspectRatio="none" memastikan titik 1000,0 dan 0,1000 selalu mengunci ke sudut layar --}}
        <svg class="absolute w-full h-full" preserveAspectRatio="none" viewBox="0 0 1000 1000" fill="none" xmlns="http://www.w3.org/2000/svg">

            {{-- Garis diagonal utama batas luar (Membelah persis dari Kanan Atas ke Kiri Bawah) --}}
            <path d="M 1000 0 C 800 100, 650 250, 500 500 C 350 750, 200 900, 0 1000" stroke="#2F5D45" stroke-width="2.5" stroke-dasharray="12 8" vector-effect="non-scaling-stroke" />

            {{-- Kontur Interval 1 --}}
            <path d="M 1000 60 C 820 150, 680 300, 540 540 C 400 780, 250 920, 60 1000" stroke="#6E9B76" stroke-width="1.5" vector-effect="non-scaling-stroke" />
            <path d="M 1000 100 C 840 180, 700 330, 570 570 C 440 810, 280 940, 100 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />
            <path d="M 1000 130 C 850 205, 715 355, 590 590 C 465 830, 305 955, 130 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />

            {{-- Kontur Indeks / Utama 2 --}}
            <path d="M 1000 170 C 870 240, 740 390, 620 620 C 500 850, 340 970, 170 1000" stroke="#2F5D45" stroke-width="2.5" vector-effect="non-scaling-stroke" />

            {{-- Kontur Interval 2 (Membentuk patahan lembah) --}}
            <path d="M 1000 240 C 900 300, 800 420, 680 640 C 560 860, 420 980, 240 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />
            <path d="M 1000 320 C 930 370, 850 470, 750 670 C 650 870, 500 990, 320 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />

            {{-- Kontur Indeks / Utama 3 --}}
            <path d="M 1000 420 C 960 460, 910 540, 820 710 C 730 880, 600 1000, 420 1000" stroke="#2F5D45" stroke-width="2.5" vector-effect="non-scaling-stroke" />

            {{-- Kontur Interval 3 --}}
            <path d="M 1000 550 C 980 580, 950 630, 890 760 C 830 890, 730 1000, 550 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />
            <path d="M 1000 700 C 990 720, 980 750, 940 830 C 900 910, 840 1000, 700 1000" stroke="#6E9B76" stroke-width="1.2" vector-effect="non-scaling-stroke" />

            {{-- Garis Elevasi Sudut Bawah (Puncak) --}}
            <path d="M 1000 850 C 995 860, 990 870, 970 910 C 950 950, 920 1000, 850 1000" stroke="#2F5D45" stroke-width="2.5" vector-effect="non-scaling-stroke" />

            {{-- Titik Koordinat (Crosshair Kehutanan - Warna Cokelat Tanah) --}}
            <path d="M 500 485 L 500 515 M 485 500 L 515 500" stroke="#8B5E34" stroke-width="1.5" vector-effect="non-scaling-stroke" />
            <path d="M 820 695 L 820 725 M 805 710 L 835 710" stroke="#8B5E34" stroke-width="1.5" vector-effect="non-scaling-stroke" />

        </svg>
    </div>

    {{-- 3. KONTEN UTAMA TEXT & ACTION BUTTONS --}}
    <div class="relative mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 w-full z-20">
        <div class="max-w-2xl">

            {{-- Badge Lokasi --}}
            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 px-4 py-1.5 font-mono text-xs text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-[#C89B3C]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                    <circle cx="12" cy="10" r="2.5"/>
                </svg>
                Wilayah kerja Sulawesi Tengah
            </span>

            {{-- Judul Besar --}}
            <h1 class="font-serif font-bold text-3xl sm:text-4xl lg:text-5xl leading-[1.15] mt-5 text-white drop-shadow-sm">
                Batas yang pasti, <br class="hidden sm:inline">untuk hutan yang lestari
            </h1>

            {{-- Deskripsi Singkat --}}
            <p class="text-white/85 text-sm sm:text-base lg:text-lg leading-relaxed mt-4 max-w-xl">
                Kami melaksanakan penataan batas, pengukuran, dan pemetaan kawasan hutan di Sulawesi Tengah
                dan sekitarnya, agar status dan luasan kawasan hutan memiliki kepastian hukum.
            </p>

            {{-- Kelompok CTA (Tombol Aksi) --}}
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 mt-8 sm:mt-10">
                {{-- Tombol Utama Menggunakan Emas Senja (#C89B3C) --}}
                <a href="{{ route('kontak.janji-temu') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#C89B3C] px-7 py-3.5 text-sm font-semibold text-[#16241C] shadow-md transition-all duration-300 hover:bg-[#C89B3C]/90 hover:-translate-y-0.5 active:translate-y-0">
                    Janji Temu Offline
                </a>

                {{-- Tombol Sekunder Border Transparan --}}
                <a href="{{ route('layanan.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/40 bg-white/5 backdrop-blur-xs px-7 py-3.5 text-sm font-semibold text-white transition-all duration-300 hover:border-[#C89B3C] hover:text-[#C89B3C] hover:bg-white/10">
                    Ajukan Layanan
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>
