<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    class="sticky top-0 z-50 bg-primary transition-shadow duration-300 ease-smooth"
    :class="scrolled ? 'shadow-md' : ''"
>
    {{-- Top utility bar - hanya tampil di desktop --}}
    <div class="hidden lg:block bg-contrast">
        <div class="mx-auto max-w-7xl px-6 py-1.5 flex justify-between text-xs text-secondary">
            <span>Kementerian Kehutanan Republik Indonesia</span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-action transition-colors">PPID</a>
                <a href="#" class="hover:text-action transition-colors">Bahasa Indonesia</a>
            </div>
        </div>
    </div>

    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 lg:w-10 lg:h-10 rounded-lg bg-action flex items-center justify-center transition-transform duration-200 ease-smooth group-hover:scale-105">
                    <svg class="w-5 h-5 lg:w-6 lg:h-6 text-contrast" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L4 14h5l-3 8 11-14h-5l3-6z"/>
                    </svg>
                </div>
                <div class="leading-tight">
                    <p class="font-serif font-medium text-base text-base lg:text-lg">BPKH Kota Palu</p>
                    <p class="text-[11px] text-secondary hidden sm:block">Balai Pemantapan Kawasan Hutan</p>
                </div>
            </a>

            {{-- Menu Desktop (lg ke atas) --}}
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="nav-link text-base {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>
                <a href="{{ route('profil.index') }}"
                   class="nav-link text-base {{ request()->routeIs('profil.*') ? 'nav-link-active' : '' }}">Profil</a>
                <a href="{{ route('layanan.index') }}"
                   class="nav-link text-base {{ request()->routeIs('layanan.*') ? 'nav-link-active' : '' }}">Layanan</a>
                <a href="{{ route('berita.index') }}"
                   class="nav-link text-base {{ request()->routeIs('berita.*') ? 'nav-link-active' : '' }}">Publikasi</a>
                <a href="{{ route('data-informasi') }}"
                   class="nav-link text-base {{ request()->routeIs('data-informasi') ? 'nav-link-active' : '' }}">Data & Informasi</a>
                <a href="{{ route('kontak') }}"
                   class="nav-link text-base {{ request()->routeIs('kontak') ? 'nav-link-active' : '' }}">Hubungi Kami</a>
            </div>

            {{-- Search icon + CTA (desktop) --}}
            <div class="hidden lg:flex items-center gap-4">
                <button type="button" aria-label="Cari" class="text-base/70 hover:text-action transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" d="m20 20-3.5-3.5"/>
                    </svg>
                </button>
                <a href="{{ route('layanan.index') }}" class="btn-cta">
                    Ajukan Layanan
                </a>
            </div>

            {{-- Hamburger button (mobile & tablet) --}}
            <button
                @click="open = !open"
                type="button"
                aria-label="Buka menu navigasi"
                :aria-expanded="open"
                class="lg:hidden text-base p-2 -mr-2"
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

    {{-- Menu Mobile & Tablet (dropdown) --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-smooth duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-smooth duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-primary-dark border-t border-secondary/20"
    >
        <div class="px-4 py-4 space-y-1 sm:grid sm:grid-cols-2 sm:gap-2 sm:space-y-0">
            <a href="{{ route('home') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('home') ? 'text-action' : '' }}">Beranda</a>
            <a href="{{ route('profil.index') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('profil.*') ? 'text-action' : '' }}">Profil</a>
            <a href="{{ route('layanan.index') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('layanan.*') ? 'text-action' : '' }}">Layanan</a>
            <a href="{{ route('berita.index') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('berita.*') ? 'text-action' : '' }}">Publikasi</a>
            <a href="{{ route('data-informasi') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('data-informasi') ? 'text-action' : '' }}">Data & Informasi</a>
            <a href="{{ route('kontak') }}" class="block py-3 px-3 rounded-lg text-base font-medium hover:bg-primary transition-colors {{ request()->routeIs('kontak') ? 'text-action' : '' }}">Hubungi Kami</a>
        </div>
        <div class="px-4 pb-5 pt-2">
            <a href="{{ route('layanan.index') }}" class="btn-cta w-full justify-center">Ajukan Layanan</a>
        </div>
    </div>
</header>
