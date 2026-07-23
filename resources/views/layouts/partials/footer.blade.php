<footer class="bg-contrast text-base/90">
    {{-- Padding vertikal dikurangi dari py-12/16 menjadi py-8/10 agar lebih ramping --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-8 lg:py-10">

        {{-- Menggunakan Asymmetrical Grid: 1 kolom (Mobile) -> 2 kolom (Tablet) -> 12 kolom rasio (Desktop) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-6">

            {{-- Kolom 1: Identitas (Lebih lebar di desktop) --}}
            <div class="lg:col-span-5 md:col-span-2">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 rounded flex items-center justify-center shrink-0 bg-primary/20 p-1">
                        <img src="{{ asset('images/logo/logo-kemenhut.png') }}" alt="Logo Kemenhut" class="w-full h-full object-contain">
                    </div>
                    <span class="font-serif font-medium text-white text-base lg:text-lg tracking-wide">BPKH Wilayah XVI</span>
                </div>
                <p class="text-xs sm:text-sm leading-relaxed text-secondary max-w-md">
                    Balai Pemantapan Kawasan Hutan wilayah Sulawesi Tengah, di bawah Direktorat Jenderal Planologi Kehutanan dan Tata Lingkungan.
                </p>
            </div>

            {{-- Kolom 2: Tautan Cepat --}}
            <div class="lg:col-span-3">
                <p class="text-sm font-semibold text-white mb-3 tracking-wide">Tautan Cepat</p>
                <ul class="space-y-2 text-xs sm:text-sm text-secondary">
                    <li><a href="{{ route('home') }}" class="hover:text-action transition-colors duration-200 inline-block">Beranda</a></li>
                    <li><a href="{{ route('layanan.pelayanan-terpadu') }}" class="hover:text-action transition-colors duration-200 inline-block">Layanan</a></li>
                    <li><a href="{{ route('publikasi.peraturan') }}" class="hover:text-action transition-colors duration-200 inline-block">Publikasi & Peraturan</a></li>
                    <li><a href="{{ route('kontak.pengaduan') }}" class="hover:text-action transition-colors duration-200 inline-block">Pengaduan</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div class="lg:col-span-4">
                <p class="text-sm font-semibold text-white mb-3 tracking-wide">Kontak Kami</p>
                <ul class="space-y-2.5 text-xs sm:text-sm text-secondary">
                    <li class="flex gap-2.5 items-start">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>
                        <a href="https://www.google.com/maps/place/..." target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors leading-relaxed">
                            Jl. DR. Abdurrahman Saleh No.18, Birobuli Utara, Kec. Palu Sel., Kota Palu, Sulawesi Tengah 94111
                        </a>
                    </li>
                    <li class="flex gap-2.5 items-center">
                        <svg class="w-4 h-4 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5c0 9 7 16 16 16l2-4-6-2-2 2c-2-1-4-3-5-5l2-2-2-6-4 1z"/>
                        </svg>
                        <a href="tel:(0451)485050" class="hover:text-white transition-colors">(0451) 485050</a>
                    </li>
                    <li class="flex gap-2.5 items-center">
                        <svg class="w-4 h-4 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6"/>
                        </svg>
                        <a href="mailto:bpkh.wil16@kehutanan.go.id" class="hover:text-action transition-colors">bpkh.wil16@kehutanan.go.id</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Sub-Footer: Copyright & Sosial Media digabung sejajar (Menghemat ruang vertikal) --}}
        <div class="mt-8 pt-5 border-t border-secondary/20 flex flex-col-reverse sm:flex-row items-center justify-between gap-4">

            <div class="text-[11px] sm:text-xs text-secondary text-center sm:text-left">
                &copy; {{ date('Y') }} BPKH Wilayah XVI Palu. All rights reserved.
            </div>

            {{-- Sosial Media dipindah ke sini dengan ukuran ikon yang lebih proporsional --}}
            <div class="flex items-center gap-2">
                <a href="#" aria-label="Facebook" class="w-8 h-8 rounded-full bg-contrast border border-secondary/20 flex items-center justify-center text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M13 22v-8h3l1-4h-4V7.5c0-1.2.4-2 2.1-2H17V2.1C16.6 2 15.5 2 14.2 2 11.5 2 9.7 3.7 9.7 6.6V10H7v4h2.7v8h3.3z"/></svg>
                </a>
                <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-contrast border border-secondary/20 flex items-center justify-center text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/></svg>
                </a>
                <a href="#" aria-label="YouTube" class="w-8 h-8 rounded-full bg-contrast border border-secondary/20 flex items-center justify-center text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="3" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M10 9l6 3-6 3z"/></svg>
                </a>
                <a href="#" aria-label="Tiktok" class="w-8 h-8 rounded-full bg-contrast border border-secondary/20 flex items-center justify-center text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                </a>
            </div>

        </div>
    </div>
</footer>
