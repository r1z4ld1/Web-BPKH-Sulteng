@extends('layouts.app')

@section('content')

    <x-page-header
        title="Lentera BPKH 16"
        :breadcrumb="[
            ['label' => 'Hubungi Kami', 'url' => route('kontak.lentera')],
            ['label' => 'Lentera BPKH 16', 'url' => route('kontak.lentera')],
        ]"
    />

    {{-- HERO WA CTA --}}
    <section class="relative overflow-hidden bg-contrast py-14 sm:py-18 lg:py-24">
         <svg class="hidden lg:block absolute -right-16 -top-16 -bottom-16 w-80 h-80  opacity-10 transition-transform duration-1000 hover:scale-105 hover:rotate-3" viewBox="0 0 260 260" fill="none" aria-hidden="true">
            <circle cx="130" cy="130" r="20" stroke="#F5F3EC" stroke-width="1" stroke-dasharray="4 4" class="animate-[spin_20s_linear_infinite] origin-center"/>
            <circle cx="130" cy="130" r="40" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="60" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="95" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="128" stroke="#C89B3C" stroke-width="1"/>
            <circle cx="130" cy="130" r="140" stroke="#C89B3C" stroke-width="1" stroke-dasharray="8 8" class="animate-[spin_30s_linear_infinite_reverse] origin-center"/>
        </svg>

        <div class="relative mx-auto max-w-4xl px-6 sm:px-8 lg:px-12 text-center z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                <p class="font-mono text-xs text-secondary uppercase tracking-widest">
                    Layanan Kehutanan Cepat, Tepat, dan Terbuka
                </p>
            </div>

            <h1 class="font-serif font-semibold text-3xl sm:text-4xl lg:text-5xl text-white mb-6 drop-shadow-sm">
                LENTERA BPKH 16
            </h1>

            <p class="text-base sm:text-lg text-white/80 leading-relaxed mb-10 max-w-2xl mx-auto font-light">
                <span class="font-medium text-white">6 jenis layanan dalam 1 genggaman</span> — konsultasi dan permohonan layanan BPKH Wilayah XVI Palu langsung terhubung melalui WhatsApp Business resmi kantor kami.
            </p>

            <a href="https://wa.me/{{ $nomorWhatsapp }}?text=Halo%20LENTERA%20BPKH%2016%2C%20saya%20ingin%20bertanya%20mengenai%20layanan."
               target="_blank" rel="noopener"
               class="group relative inline-flex items-center gap-3 rounded-2xl bg-action px-8 py-4.5 text-base sm:text-lg font-medium text-contrast shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 hover:bg-action-dark hover:-translate-y-1 hover:shadow-[0_12px_40px_rgb(200,155,60,0.3)] overflow-hidden">
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                <svg class="relative z-10 w-6 h-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.847 9.847 0 0012.04 2zm0 18.1c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 01-1.26-4.36c0-4.54 3.7-8.23 8.26-8.23 2.2 0 4.27.86 5.83 2.42a8.18 8.18 0 012.42 5.82c0 4.55-3.7 8.24-8.26 8.24z"/>
                </svg>
                <span class="relative z-10 font-bold tracking-wide">0811-432-1616</span>
            </a>
        </div>
    </section>

    {{-- 6 LAYANAN --}}
    <section class="bg-canvas py-16 sm:py-20 lg:py-24 relative">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">
            <div class="text-center mb-14">
                <p class="inline-block font-mono text-xs font-semibold text-highlight bg-highlight/10 px-3 py-1 rounded-full uppercase tracking-widest mb-3">
                    Solusi Terpadu
                </p>
                <h2 class="font-serif font-medium text-2xl sm:text-3xl text-contrast">
                    6 Layanan dalam LENTERA BPKH 16
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">
                @foreach ($layananLentera as $item)
                    <div class="group relative flex flex-col bg-white p-6 sm:p-8 rounded-2xl border border-contrast/5 shadow-sm hover:shadow-xl hover:border-highlight/30 transition-all duration-300 ease-out hover:-translate-y-1.5 overflow-hidden z-10 cursor-default">
                        {{-- Elemen dekoratif latar belakang yang muncul saat di-hover --}}
                        <div class="absolute -right-8 -top-8 w-32 h-32 bg-canvas rounded-full opacity-50 group-hover:scale-[2.5] transition-transform duration-700 ease-out z-0"></div>

                        <div class="relative z-10">
                            <div class="w-12 h-12 rounded-xl bg-highlight/10 flex items-center justify-center mb-5 border border-highlight/20 group-hover:bg-highlight group-hover:border-highlight transition-colors duration-300">
                                <span class="font-mono text-sm font-bold text-highlight group-hover:text-white transition-colors duration-300">
                                    {{ $item['nomor'] }}
                                </span>
                            </div>
                            <h3 class="text-base sm:text-lg font-medium text-contrast leading-snug group-hover:text-primary transition-colors duration-300">
                                {{ $item['judul'] }}
                            </h3>
                        </div>

                        {{-- Indikator garis bawah interaktif --}}
                        <div class="absolute bottom-0 left-0 w-0 h-1 bg-highlight group-hover:w-full transition-all duration-500 ease-out"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ALAMAT, PETA, JAM OPERASIONAL, SOSIAL MEDIA --}}
    <section class="bg-white py-16 sm:py-20 lg:py-24 border-t border-contrast/5">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">

                {{-- Kiri: Alamat + Peta --}}
                <div class="flex flex-col h-full">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 border border-primary/20">
                            <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" d="M12 21c-4-4-7-7.5-7-11a7 7 0 1114 0c0 3.5-3 7-7 11z"/>
                                <circle cx="12" cy="10" r="2.5"/>
                            </svg>
                        </div>
                        <h2 class="font-serif font-medium text-2xl text-contrast">Lokasi Kantor</h2>
                    </div>

                    <p class="text-base text-contrast/70 leading-relaxed mb-6 pl-1">
                        Jl. DR. Abdurrahman Saleh No.18, Birobuli Utara, Kec. Palu Sel., Kota Palu, Sulawesi Tengah 94111, Indonesia
                    </p>

                    <div class="relative group rounded-2xl overflow-hidden border border-contrast/10 shadow-sm hover:shadow-lg transition-shadow duration-300 mb-4 aspect-[4/3] sm:aspect-video flex-grow">
                        <iframe
                            src="https://www.google.com/maps?q=Balai+Pemantapan+Kawasan+Hutan+Kota+Palu&output=embed"
                            class="absolute inset-0 w-full h-full grayscale-[20%] group-hover:grayscale-0 transition-all duration-500"
                            style="border:0;"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta lokasi kantor BPKH Kota Palu"
                        ></iframe>
                    </div>

                    <a href="https://maps.google.com/?q=Balai+Pemantapan+Kawasan+Hutan+Kota+Palu" target="_blank" rel="noopener"
                       class="inline-flex items-center self-start gap-2 text-sm font-semibold text-primary hover:text-action transition-colors px-4 py-2 rounded-lg hover:bg-primary/5">
                        Lihat Rute di Google Maps
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7M21 12H3"/>
                        </svg>
                    </a>
                </div>

                {{-- Kanan: Jam Operasional + Sosial Media --}}
                <div class="flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-highlight/10 flex items-center justify-center shrink-0 border border-highlight/20">
                            <svg class="w-5 h-5 text-highlight" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="font-serif font-medium text-2xl text-contrast">Jam Operasional</h2>
                    </div>

                    <div class="rounded-2xl border border-contrast/10 bg-canvas/30 mb-12 overflow-hidden shadow-sm">
                        @foreach ($jamOperasional as $index => $item)
                            <div class="flex items-center justify-between px-6 py-4 transition-colors duration-200 hover:bg-white {{ !$loop->last ? 'border-b border-contrast/5' : '' }}">
                                <span class="text-sm font-medium text-contrast/80">{{ $item['hari'] }}</span>
                                <span class="inline-flex items-center justify-center font-mono text-xs font-semibold px-3 py-1 rounded-full {{ $item['jam'] === 'Tutup' ? 'bg-contrast/5 text-contrast/50' : 'bg-primary/10 text-primary' }}">
                                    {{ $item['jam'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center shrink-0 border border-secondary/20">
                            <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
                                <path stroke-linecap="round" d="M8.6 10.5l6.8-3.9M8.6 13.5l6.8 3.9"/>
                            </svg>
                        </div>
                        <h2 class="font-serif font-medium text-2xl text-contrast">Media Sosial</h2>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a href="#" target="_blank" rel="noopener" aria-label="Facebook"
                           class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center border border-primary/10 transition-all duration-300 hover:bg-primary hover:border-primary hover:-translate-y-1 hover:shadow-md group">
                            <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 22v-8h3l1-4h-4V7.5c0-1.2.4-2 2.1-2H17V2.1C16.6 2 15.5 2 14.2 2 11.5 2 9.7 3.7 9.7 6.6V10H7v4h2.7v8h3.3z"/>
                            </svg>
                        </a>
                        <a href="https://instagram.com/bpkhwilayah16palu" target="_blank" rel="noopener" aria-label="Instagram"
                           class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center border border-primary/10 transition-all duration-300 hover:bg-primary hover:border-primary hover:-translate-y-1 hover:shadow-md group">
                            <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="#" target="_blank" rel="noopener" aria-label="YouTube"
                           class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center border border-primary/10 transition-all duration-300 hover:bg-primary hover:border-primary hover:-translate-y-1 hover:shadow-md group">
                            <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="6" width="20" height="12" rx="3"/><path d="M10 9l6 3-6 3z" fill="currentColor" stroke="none"/>
                            </svg>
                        </a>
                        <a href="#" target="_blank" rel="noopener" aria-label="YouTube"
                           class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center border border-primary/10 transition-all duration-300 hover:bg-primary hover:border-primary hover:-translate-y-1 hover:shadow-md group">
                            <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                               <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                            </svg>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
