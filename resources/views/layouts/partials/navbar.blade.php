@php
    $menuTentang = [
        ['label' => 'Sejarah', 'url' => route('profil.sejarah')],
        ['label' => 'Tugas dan Fungsi', 'url' => route('profil.tugas-fungsi')],
        ['label' => 'Visi, Misi dan Tujuan', 'url' => route('profil.visi-misi')],
        ['label' => 'Struktur Organisasi', 'url' => route('profil.struktur')],
        ['label' => 'Motto', 'url' => route('profil.motto')],
        ['label' => 'Core Values ASN BerAKHLAK', 'url' => route('profil.core-values')],
       /* ['label' => 'Pembangunan Zona Integritas', 'url' => route('profil.zi')],
        ['label' => 'Benturan Kepentingan', 'url' => route('profil.benturan-kepentingan')],*/
    ];

    $menuLayanan = [
        ['label' => 'Peta Interaktif Wilayah Kerja', 'url' => route('layanan.peta')],
        ['label' => 'Pojok Konsultasi', 'url' => route('layanan.konsultasi')],
        ['label' => 'Survei Kepuasan Masyarakat', 'url' => route('layanan.survei')],
    ];

    $menuPublikasi = [
        ['label' => 'Peraturan', 'url' => route('publikasi.peraturan')],
        ['label' => 'Penghargaan', 'url' => route('publikasi.penghargaan')],
    ];

    $menuKontak = [
        ['label' => 'Formulir Kontak', 'url' => route('kontak.formulir')],
        ['label' => 'Pengaduan Masyarakat', 'url' => route('kontak.pengaduan')],
        ['label' => 'Whistle Blowing System', 'url' => route('kontak.wbs')],
    ];
@endphp

<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    class="sticky top-0 z-50 bg-white transition-shadow duration-300 ease-smooth"
    :class="scrolled ? 'shadow-md' : ''"
>
    {{-- Top utility bar --}}
    <div class="hidden nav:block bg-contrast">
        <div class="mx-auto max-w-7xl px-6 py-1.5 flex justify-between items-center text-xs text-secondary">
            <span>Kementerian Kehutanan Republik Indonesia</span>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-action transition-colors">PPID</a>
                <span class="w-px h-3 bg-white/20"></span>
                <div class="flex items-center gap-3">
                    <span class="text-xs">Bahasa Indonesia</span>
                </div>
            </div>
        </div>
    </div>

    <nav class="mx-auto max-w-7xl px-4 sm:px-6 nav:px-8">
        <div class="flex items-center justify-between h-16 nav:h-20">

           {{-- Logo --}}
<a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0">
    <div class="w-9 h-9 nav:w-10 nav:h-10 rounded-lg bg-primary flex items-center justify-center shrink-0 transition-transform duration-200 ease-smooth group-hover:scale-105">
        <img src="{{ asset('images/logo/logo-kemenhut.png') }}" alt="Logo Kemenhut" class="w-6 h-6 nav:w-7 nav:h-7 object-contain">
    </div>
    <div class="leading-tight hidden sm:block whitespace-nowrap">
        <p class="font-serif font-medium text-base text-contrast">BPKH Wilayah XVI</p>
        <p class="text-[11px] text-secondary hidden nav:block">Balai Pemantapan Kawasan Hutan</p>
    </div>
</a>

            {{-- Menu Desktop: tampil dari breakpoint nav (1000px) ke atas --}}
            <div class="hidden nav:flex items-center gap-6 whitespace-nowrap">
                <a href="{{ route('home') }}" class="nav-link text-base {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>

                <x-nav-dropdown label="Tentang" :items="$menuTentang" />
                <x-nav-dropdown label="Layanan" :items="$menuLayanan" />

                <a href="{{ route('berita.index') }}" class="nav-link text-base {{ request()->routeIs('berita.*') ? 'nav-link-active' : '' }}">Berita</a>

                <x-nav-dropdown label="Publikasi" :items="$menuPublikasi" />
                <x-nav-dropdown label="Hubungi Kami" :items="$menuKontak" />
            </div>

            <div class="hidden nav:flex items-center gap-4 shrink-0">
                <button type="button" aria-label="Cari" class="text-contrast/70 hover:text-action transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" d="m20 20-3.5-3.5"/>
                    </svg>
                </button>
                <a href="{{ route('login') }}" class="btn-cta whitespace-nowrap">
                    Masuk
                </a>
            </div>

            {{-- Hamburger: tampil di bawah nav (mobile + tablet) --}}
            <button
                @click="open = !open"
                type="button"
                aria-label="Buka menu navigasi"
                :aria-expanded="open"
                class="nav:hidden text-contrast p-2 -mr-2 shrink-0"
            >
                <svg x-show="!open" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Menu Mobile & Tablet: tampil di bawah nav --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-smooth duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-smooth duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="nav:hidden bg-contrast text-white max-h-[calc(100vh-4rem)] overflow-y-auto"
    >
        <div class="px-4 py-2">
            <a href="{{ route('home') }}" class="block py-3 px-3 text-base font-medium border-b border-white/10 {{ request()->routeIs('home') ? 'text-action' : '' }}">Beranda</a>

            <x-mobile-nav-accordion label="Tentang" :items="$menuTentang" />
            <x-mobile-nav-accordion label="Layanan" :items="$menuLayanan" />

            <a href="{{ route('berita.index') }}" class="block py-3 px-3 text-base font-medium border-b border-white/10 {{ request()->routeIs('berita.*') ? 'text-action' : '' }}">Berita</a>

            <x-mobile-nav-accordion label="Publikasi" :items="$menuPublikasi" />
            <x-mobile-nav-accordion label="Hubungi Kami" :items="$menuKontak" />
        </div>
        <div class="px-4 py-4">
            <a href="{{ route('login') }}" class="btn-cta w-full justify-center">Masuk</a>
        </div>
    </div>
</header>
