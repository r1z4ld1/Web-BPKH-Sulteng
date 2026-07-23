@extends('layouts.app')

@section('content')

    <x-page-header
        title="Core Values ASN BerAKHLAK"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Core Values ASN BerAKHLAK', 'url' => route('profil.core-values')],
        ]"
    />

    <section
        x-data="{ active: 0 }"
        class="bg-canvas py-14 sm:py-16 lg:py-20"
    >
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">
            <div class="flex flex-col items-center text-center mb-10 sm:mb-14">
    {{-- Ikon & Judul --}}
    <div class="flex items-center gap-3 mb-5 sm:mb-6">
        <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shrink-0 shadow-sm">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v18M4 8h5m-5 5h5m6-10v18m0-14h5m-5 5h5"/>
            </svg>
        </div>
        <h2 class="font-serif text-4xl lg:text-4xl font-semibold">
            Core Values ASN BerAKHLAK
        </h2>
    </div>

    {{-- INTRO --}}
    <div class="max-w-3xl mx-auto space-y-4">
        <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
            BerAKHLAK merupakan akronim dari Berorientasi Pelayanan, Akuntabel, Kompeten, Harmonis,
            Loyal, Adaptif, dan Kolaboratif. Core Values ASN ini menjadi sari dari nilai-nilai dasar
            ASN sesuai Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara, dalam satu
            kesamaan persepsi yang lebih mudah dipahami dan diterapkan oleh seluruh ASN.
        </p>
        <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
            Core Values ASN menjadi titik tonggak penguatan budaya kerja, tidak hanya pada ASN
            tingkat pusat namun juga tingkat daerah — sebagaimana pesan Presiden Joko Widodo bahwa
            ASN pusat maupun daerah harus mempunyai core values yang sama.
        </p>
    </div>
</div>

            <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-2 mb-12">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="font-mono text-xs text-primary">#BanggaMelayaniBangsa</span>
                <span class="text-xs text-contrast/50">— Employer Branding ASN</span>
            </div>

            {{-- WORD INTERAKTIF --}}
            <div class="rounded-2xl bg-contrast p-8 sm:p-10 lg:p-12 mb-3">
                <p class="font-mono text-xs text-secondary uppercase tracking-widest mb-6 text-center">
                    Ketuk setiap huruf untuk lihat panduan perilakunya
                </p>
                <div class="flex flex-wrap items-center justify-center gap-1 sm:gap-2">
                    @foreach ($values as $i => $item)
                        <button
                            @click="active = {{ $i }}"
                            type="button"
                            class="font-serif font-medium text-3xl sm:text-5xl lg:text-6xl px-1 sm:px-2 rounded-lg transition-all duration-200 ease-smooth"
                            :class="active === {{ $i }} ? 'text-action scale-110' : 'text-white/25 hover:text-white/50'"
                        >{{ $item['huruf'] }}</button>
                    @endforeach
                </div>
            </div>

            {{-- PANEL AKTIF --}}
            <div class="rounded-2xl border border-contrast/10 bg-white p-7 sm:p-9 mb-14 min-h-[280px]">
                @foreach ($values as $i => $item)
                    @php
                        $warnaMap = [
                            'primary'   => ['bg' => 'bg-primary',   'text' => 'text-primary',   'soft' => 'bg-primary/10'],
                            'secondary' => ['bg' => 'bg-secondary', 'text' => 'text-secondary', 'soft' => 'bg-secondary/10'],
                            'highlight' => ['bg' => 'bg-highlight', 'text' => 'text-highlight', 'soft' => 'bg-highlight/10'],
                            'action'    => ['bg' => 'bg-action',    'text' => 'text-action',    'soft' => 'bg-action/10'],
                        ];
                        $warna = $warnaMap[$item['warna']];
                    @endphp
                    <div
                        x-show="active === {{ $i }}"
                        x-transition:enter="transition ease-smooth duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-11 h-11 rounded-xl {{ $warna['soft'] }} {{ $warna['text'] }} font-serif font-medium text-xl flex items-center justify-center shrink-0">
                                {{ $item['huruf'] }}
                            </span>
                            <h2 class="font-serif font-medium text-xl sm:text-2xl">{{ $item['kata'] }}</h2>
                        </div>

                        <div class="space-y-3">
                            @foreach ($item['perilaku'] as $poin)
                                <div class="flex gap-3 items-start">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $warna['bg'] }} mt-2 shrink-0"></span>
                                    <p class="text-sm sm:text-base text-contrast/75 leading-relaxed">{{ $poin }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="text-sm sm:text-base text-contrast/70 leading-relaxed text-center max-w-2xl mx-auto mb-20">
                ASN harus mempunyai orientasi untuk memberikan pelayanan terbaik kepada masyarakat.
            </p>

            {{-- GALERI PEJABAT --}}
@php
    // Memastikan data berupa collection untuk memudahkan pemisahan hirarki
    $pejabatCollection = collect($pejabat);
    $kepalaBalai = $pejabatCollection->first(); // Mengambil urutan 1 (Kepala Balai)
    $kepalaSeksi = $pejabatCollection->skip(1); // Mengambil sisanya (Kepala Seksi dkk)
@endphp

<div class="py-0">
    {{-- Bagian Judul --}}
    <div class="text-center mb-12 sm:mb-16">
        <p class="font-mono text-xs text-highlight font-semibold uppercase tracking-widest mb-2">Teladan Penerapan BerAKHLAK</p>
        <h2 class="font-serif text-4xl lg:text-4xl font-semibold mb-2">Pimpinan BPKH Wilayah XVI</h2>
        <p class="text-sm sm:text-base text-contrast/70 max-w-xl mx-auto leading-relaxed px-4">
            Kepala Balai dan Kepala Seksi yang menjalankan nilai-nilai BerAKHLAK
            dalam memimpin dan melayani setiap hari.
        </p>
    </div>

    <div class="flex flex-col items-center">

        {{-- ============ LEVEL 1: KEPALA BALAI (Tengah Atas) ============ --}}
        @if($kepalaBalai)
        <div class="w-full max-w-[260px] sm:max-w-[280px] mb-12 sm:mb-16 group cursor-pointer">
            {{-- Wrapper Gambar dengan Animasi Premium --}}
            <div class="relative aspect-[3/4] rounded-2xl overflow-hidden bg-secondary/5 mb-4 shadow-md
                        transition-all duration-500 ease-out
                        group-hover:shadow-2xl group-hover:shadow-primary/20 group-hover:-translate-y-2
                        active:scale-[0.98] active:shadow-md ring-1 ring-contrast/5 group-hover:ring-primary/30">

                <img
                    src="{{ asset('images/pejabat/' . $kepalaBalai['foto']) }}"
                    alt="Foto {{ $kepalaBalai['nama'] }}, {{ $kepalaBalai['jabatan'] }}"
                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                    loading="lazy"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >

                {{-- Fallback jika gambar gagal dimuat --}}
                <div class="hidden absolute inset-0 items-center justify-center bg-secondary/10">
                    <svg class="w-12 h-12 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                        <circle cx="12" cy="8" r="4"/><path stroke-linecap="round" d="M4 20c0-4 3.5-7 8-7s8 3 8 7"/>
                    </svg>
                </div>

                {{-- Overlay Gradient Premium (Muncul saat Hover/Tap) --}}
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute inset-0 border border-white/0 group-hover:border-white/20 rounded-2xl transition-colors duration-500 pointer-events-none"></div>
            </div>

            {{-- Teks --}}
            <div class="text-center transform transition-all duration-500 group-hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-semibold text-gray-800 leading-snug group-hover:text-primary transition-colors duration-300">
                    {{ $kepalaBalai['nama'] }}
                </p>
                <p class="text-xs sm:text-sm text-contrast/60 font-medium uppercase tracking-wide mt-1.5">
                    {{ $kepalaBalai['jabatan'] }}
                </p>
            </div>
        </div>
        @endif

        {{-- ============ LEVEL 2: KEPALA SEKSI (Berjejer di Bawah) ============ --}}
        @if($kepalaSeksi->isNotEmpty())
        {{-- Flex wrap dengan justify-center memastikan item genap/ganjil selalu rapi di tengah --}}
        <div class="flex flex-wrap justify-center gap-6 sm:gap-8 lg:gap-10 w-full max-w-5xl px-4 sm:px-6">
            @foreach ($kepalaSeksi as $item)
                <div class="w-[calc(50%-0.75rem)] sm:w-[calc(33.333%-1.5rem)] lg:w-[calc(25%-1.5rem)] max-w-[220px] group cursor-pointer">

                    {{-- Wrapper Gambar (Ukuran sedikit lebih kecil dari Kepala Balai untuk penegasan hirarki) --}}
                    <div class="relative aspect-[3/4] rounded-2xl overflow-hidden bg-secondary/5 mb-3.5 shadow-sm
                                transition-all duration-500 ease-out
                                group-hover:shadow-xl group-hover:shadow-primary/15 group-hover:-translate-y-1.5
                                active:scale-[0.97] active:shadow-sm ring-1 ring-contrast/5 group-hover:ring-primary/25">

                        <img
                            src="{{ asset('images/pejabat/' . $item['foto']) }}"
                            alt="Foto {{ $item['nama'] }}, {{ $item['jabatan'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                            loading="lazy"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >

                        <div class="hidden absolute inset-0 items-center justify-center bg-secondary/10">
                            <svg class="w-10 h-10 text-secondary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <circle cx="12" cy="8" r="4"/><path stroke-linecap="round" d="M4 20c0-4 3.5-7 8-7s8 3 8 7"/>
                            </svg>
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-primary/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>

                    {{-- Teks --}}
                    <div class="text-center transform transition-all duration-500 group-hover:-translate-y-0.5">
                        <p class="text-sm sm:text-base font-semibold text-gray-800 leading-snug group-hover:text-primary transition-colors duration-300 line-clamp-2">
                            {{ $item['nama'] }}
                        </p>
                        <p class="text-[11px] sm:text-xs text-contrast/60 font-medium uppercase tracking-wider mt-1 line-clamp-2">
                            {{ $item['jabatan'] }}
                        </p>
                    </div>

                </div>
            @endforeach
        </div>
        @endif

    </div>
</div>

        </div>
    </section>

@endsection
