<footer class="bg-contrast text-base/90">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Kolom 1: Identitas --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L4 14h5l-3 8 11-14h-5l3-6z"/>
                    </svg>
                    <span class="font-serif font-medium text-white">BPKH Kota Palu</span>
                </div>
                <p class="text-sm leading-relaxed text-secondary">
                    Balai Pemantapan Kawasan Hutan wilayah Sulawesi Tengah, di bawah Direktorat Jenderal Planologi Kehutanan dan Tata Lingkungan.
                </p>
            </div>

            {{-- Kolom 2: Tautan cepat --}}
            <div>
                <p class="text-sm font-medium text-white mb-3">Tautan cepat</p>
                <ul class="space-y-2 text-sm text-secondary">
                    <li><a href="{{ route('profil.index') }}" class="hover:text-action transition-colors">Profil kantor</a></li>
                    <li><a href="{{ route('layanan.index') }}" class="hover:text-action transition-colors">Layanan</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-action transition-colors">Publikasi & peraturan</a></li>
                    <li><a href="{{ route('kontak.pengaduan') }}" class="hover:text-action transition-colors">Pengaduan</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div>
                <p class="text-sm font-medium text-white mb-3">Kontak</p>
                <ul class="space-y-3 text-sm text-secondary">
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>
                        <span>Jl. Contoh Alamat No. 1, Palu, Sulawesi Tengah</span>
                    </li>
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5c0 9 7 16 16 16l2-4-6-2-2 2c-2-1-4-3-5-5l2-2-2-6-4 1z"/>
                        </svg>
                        <span>(0451) 000000</span>
                    </li>
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6"/>
                        </svg>
                        <span>info@bpkhpalu.go.id</span>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Sosial media --}}
            <div>
                <p class="text-sm font-medium text-white mb-3">Ikuti kami</p>
                <div class="flex gap-3">
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center hover:bg-action transition-colors duration-200">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M13 22v-8h3l1-4h-4V7.5c0-1.2.4-2 2.1-2H17V2.1C16.6 2 15.5 2 14.2 2 11.5 2 9.7 3.7 9.7 6.6V10H7v4h2.7v8h3.3z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center hover:bg-action transition-colors duration-200">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/></svg>
                    </a>
                    <a href="#" aria-label="YouTube" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center hover:bg-action transition-colors duration-200">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="3" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M10 9l6 3-6 3z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-secondary/20 mt-10 pt-6 text-center text-xs text-secondary">
            &copy; {{ date('Y') }} Balai Pemantapan Kawasan Hutan Kota Palu. Direktorat Jenderal Planologi Kehutanan dan Tata Lingkungan.
        </div>
    </div>
</footer>
