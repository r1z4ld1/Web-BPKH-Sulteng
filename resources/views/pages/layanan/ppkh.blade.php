@extends('layouts.app')

@section('content')

    <x-page-header
        title="Proses Persetujuan Penggunaan Kawasan Hutan (PPKH)"
        :breadcrumb="[
            ['label' => 'Layanan', 'url' => route('layanan.alur')],
            ['label' => 'Proses PPKH', 'url' => route('layanan.ppkh')],
        ]"
    />

    <section class="bg-canvas py-16 sm:py-20 lg:py-24 font-sans text-contrast overflow-hidden" x-data="{ showSyarat: false }">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">

            {{-- 1. HEADER INFORMASI & ATURAN --}}
            <div class="bg-white rounded-2xl shadow-sm border border-contrast/10 p-6 md:p-8 mb-16 max-w-4xl mx-auto text-center relative overflow-hidden group hover:shadow-md transition-shadow duration-300">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-secondary to-primary"></div>
                <h3 class="text-sm font-bold tracking-widest text-primary uppercase mb-3">Informasi Permohonan</h3>
                <p class="text-base sm:text-lg text-contrast/70 leading-relaxed max-w-3xl mx-auto mb-4">
                    Permohonan Persetujuan Penggunaan Kawasan Hutan (PPKH) diajukan melalui portal resmi
                    <a href="https://sinergy.planologi.kehutanan.go.id/" target="_blank" rel="noopener" class="text-primary font-semibold underline decoration-2 decoration-primary/20 hover:text-primary-dark hover:decoration-primary/50 transition-all duration-300">sinergy.planologi.kehutanan.go.id</a>.
                </p>
                <div class="inline-flex items-center gap-2 bg-secondary/10 text-contrast/60 text-xs px-4 py-2 rounded-full font-medium">
                    <svg class="w-4 h-4 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Sumber: Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 7 Tahun 2021
                </div>
            </div>

            {{-- 2. TIMELINE KESELURUHAN --}}
            <div class="relative w-full max-w-5xl mx-auto">

                {{-- Garis Utama Timeline --}}
                <div class="absolute left-6 md:left-1/2 top-4 bottom-0 w-1 bg-gradient-to-b from-secondary/20 via-secondary/40 to-primary/60 rounded-full md:-translate-x-1/2 opacity-50 z-0"></div>

                {{-- Aktor Penanda --}}
                <div class="relative flex justify-start md:justify-center mb-16 z-10 pl-2 md:pl-0">
                    <div class="rounded-full bg-contrast shadow-sm px-6 py-2.5 transform hover:scale-105 transition-transform duration-300 border-2 border-canvas">
                        <span class="text-sm font-bold text-white tracking-wide uppercase">Mulai: Pemohon</span>
                    </div>
                </div>

                <div class="space-y-12 md:space-y-20">

                    {{-- 01: Upload Dokumen (KIRI di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full group">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-110 group-hover:bg-primary-light">
                            01
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pr-12 md:text-right">
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl text-left md:text-right">
                                <div class="flex flex-col md:items-end mb-4">
                                    <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-[10px] font-bold rounded mb-2 border border-primary/20">Pasal 379</span>
                                    <h2 class="font-bold text-xl text-contrast group-hover:text-primary transition-colors">Upload Dokumen Permohonan</h2>
                                </div>

                                <p class="text-xs font-bold text-contrast/40 uppercase tracking-wider mb-3">Persyaratan Administrasi</p>
                                <ul class="space-y-2 mb-5 inline-block text-left">
                                    @foreach ($syaratAdministrasi as $item)
                                        <li class="flex items-start gap-2 text-sm text-contrast/70">
                                            <svg class="w-4 h-4 text-secondary mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            <span class="leading-relaxed">{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="border-t border-contrast/10 pt-4 mt-2 text-left md:text-right">
                                    <button type="button" @click="showSyarat = !showSyarat" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-dark transition-colors">
                                        <span x-text="showSyarat ? 'Sembunyikan Syarat Teknis' : 'Lihat Syarat Teknis'"></span>
                                        <svg class="w-4 h-4 transition-transform duration-300" :class="showSyarat ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                    <ul x-show="showSyarat" x-collapse class="mt-4 space-y-2 text-left bg-canvas p-4 rounded-xl border border-contrast/10">
                                        @foreach ($syaratTeknis as $item)
                                            <li class="flex items-start gap-2 text-xs text-contrast/60 leading-relaxed">
                                                <span class="w-1.5 h-1.5 rounded-full bg-secondary shrink-0 mt-1.5"></span>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                    {{-- VERIFIKASI ONLINE (Center Alert) --}}
                    <div class="relative w-full z-10 group">
                        <div class="pl-16 md:pl-0 md:max-w-md mx-auto">
                            <div class="bg-highlight/5 border border-highlight/20 p-5 rounded-2xl shadow-sm flex items-start gap-4 transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-md">
                                <div class="bg-highlight/10 p-2 rounded-full shrink-0">
                                    <svg class="w-5 h-5 text-highlight" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-contrast mb-1">Verifikasi Online Sistem</h4>
                                    <p class="text-xs text-contrast/70 leading-relaxed">
                                        Sistem mengecek syarat administrasi & teknis. Jika <strong class="text-highlight font-semibold">tidak lengkap</strong>, dikembalikan. Jika <strong class="text-primary font-semibold">terverifikasi</strong>, lanjut ke Loket.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 02: Loket Pelayanan (KANAN di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row-reverse items-center justify-between w-full group">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-110 group-hover:bg-primary-light">
                            02
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pl-12 text-left">
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl">
                                <div class="flex items-center gap-3 mb-3">
                                    <h2 class="font-bold text-xl text-contrast group-hover:text-primary transition-colors">Loket Pelayanan</h2>
                                    <span class="px-2 py-1 bg-primary/10 text-primary text-[10px] font-bold rounded border border-primary/20">Pasal 378</span>
                                </div>
                                <p class="text-sm text-contrast/70 leading-relaxed mb-5">
                                    Pemohon menyerahkan dokumen fisik membawa bukti verifikasi online. Verifikator memeriksa kembali kesesuaian dokumen.
                                </p>
                                <div class="flex items-center gap-3 bg-canvas p-3.5 rounded-xl border border-contrast/10">
                                    <div class="bg-white p-1.5 rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <p class="text-xs font-medium text-contrast/70">Loket 4 Kementerian Kehutanan, Blok 1 Lt 1, Gedung Manggala Wanabakti</p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                    {{-- 03 & 04: PROSES PARALEL --}}
                    <div class="relative w-full z-10 pt-8">
                        <div class="hidden md:block absolute left-1/2 top-4 w-[60%] h-6 border-t-2 border-dashed border-secondary/40 transform -translate-x-1/2"></div>
                        <div class="hidden md:block absolute left-[20%] top-4 w-0.5 h-12 border-l-2 border-dashed border-secondary/40"></div>
                        <div class="hidden md:block absolute right-[20%] top-4 w-0.5 h-12 border-l-2 border-dashed border-secondary/40"></div>

                        <div class="text-center mb-6 pl-16 md:pl-0 relative z-20">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-contrast text-white text-[10px] font-bold uppercase tracking-wider rounded-full shadow-sm">
                                <svg class="w-3 h-3 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                Berjalan Paralel
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 pl-16 md:pl-0">
                            {{-- Node 03 --}}
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 relative group transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:border-secondary">
                                <div class="absolute -top-5 left-6 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold shadow-sm ring-4 ring-canvas transition-colors group-hover:bg-primary-light">
                                    03
                                </div>
                                <h3 class="font-bold text-lg text-contrast mt-2 mb-2 group-hover:text-primary transition-colors">Penilaian Berkas (Dirjen Planologi)</h3>
                                <span class="inline-block px-2 py-1 bg-highlight/10 text-highlight text-[10px] font-bold rounded mb-4">Maks. 24 Hari Kerja</span>
                                <p class="text-sm text-contrast/70 leading-relaxed mb-4">
                                    Identifikasi kesesuaian persyaratan pemohon; penelaahan teknis yang melibatkan Direktorat Jenderal lain terkait melalui Rapat Konfirmasi.
                                </p>
                                <div class="bg-canvas p-4 rounded-xl border border-contrast/10">
                                    <p class="text-[10px] font-bold text-contrast/40 uppercase tracking-widest mb-2">Substansi Rapat</p>
                                    <ul class="space-y-1.5">
                                        @foreach ($rapatKonfirmasi as $item)
                                            <li class="flex items-start gap-2 text-xs text-contrast/60 leading-relaxed">
                                                <span class="w-1 h-1 rounded-full bg-secondary mt-1.5 shrink-0"></span>{{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Node 04 --}}
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 relative group transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:border-secondary">
                                <div class="absolute -top-5 left-6 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold shadow-sm ring-4 ring-canvas transition-colors group-hover:bg-primary-light">
                                    04
                                </div>
                                <h3 class="font-bold text-lg text-contrast mt-2 mb-2 group-hover:text-primary transition-colors">Penelaahan Hukum</h3>
                                <span class="inline-block px-2 py-1 bg-secondary/10 text-secondary text-[10px] font-bold rounded mb-4">Maks. 7 Hari Kerja</span>
                                <p class="text-sm text-contrast/70 leading-relaxed">
                                    Sekretaris Jenderal melakukan penelaahan hukum secara cermat, kemudian merumuskan dan menyampaikan konsep Keputusan Persetujuan Penggunaan Kawasan Hutan beserta peta lampiran kepada Menteri.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- 05: Penerbitan Keputusan (KIRI di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full group mt-12 md:mt-20">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-110 group-hover:bg-primary-light">
                            05
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pr-12 md:text-right">
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl text-left md:text-right">
                                <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-[10px] font-bold rounded mb-2 border border-primary/20">Pasal 388 Ayat 9</span>
                                <h2 class="font-bold text-xl text-contrast group-hover:text-primary transition-colors mb-3">Penerbitan Keputusan oleh Menteri</h2>
                                <p class="text-sm text-contrast/70 leading-relaxed">
                                    Menteri, dalam jangka waktu paling lama <strong>3 hari kerja</strong>, menerbitkan Keputusan Persetujuan Penggunaan Kawasan Hutan secara resmi.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                    {{-- 06: HIGHLIGHT - PPKH TERBIT --}}
                    <div class="relative w-full z-10 group py-4">
                        <div class="pl-16 md:pl-0 md:max-w-2xl mx-auto">
                            <div class="bg-contrast p-6 sm:p-8 rounded-2xl shadow-sm text-center transform transition-all duration-300 group-hover:-translate-y-2 group-hover:scale-[1.02]">
                                <div class="mx-auto w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-action" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-serif text-white mb-2">Persetujuan Terbit!</h3>
                                <p class="text-secondary text-sm sm:text-base">Dokumen Persetujuan Penggunaan Kawasan Hutan (PPKH) resmi diserahkan kepada Pemohon.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 07: Tata Batas (KANAN di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row-reverse items-center justify-between w-full group">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-110 group-hover:bg-primary-light">
                            07
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pl-12 text-left">
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl">
                                <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-[10px] font-bold rounded mb-2 border border-primary/20">Pasal 388</span>
                                <h2 class="font-bold text-xl text-contrast group-hover:text-primary transition-colors mb-3">Penyelesaian Tata Batas Areal</h2>
                                <p class="text-sm text-contrast/70 leading-relaxed">
                                    Pemegang PPKH wajib menyelesaikan tata batas areal kerjanya di lapangan serta memenuhi seluruh komitmen lain yang dipersyaratkan sebagai pemegang ijin PPKH.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                    {{-- 08: Laporan (KIRI di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full group">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-110 group-hover:bg-primary-light">
                            08
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pr-12 md:text-right">
                            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-contrast/10 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl text-left md:text-right">
                                <h2 class="font-bold text-xl text-contrast group-hover:text-primary transition-colors mb-3">Laporan Penyelesaian Tata Batas</h2>
                                <p class="text-sm text-contrast/70 leading-relaxed">
                                    Setelah proses tata batas rampung, Pemegang PPKH menyusun dan menyampaikan laporan penyelesaian tata batas areal tersebut kepada Balai Kehutanan setempat.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                    {{-- 09: Penetapan (KANAN di Desktop) --}}
                    <div class="relative flex flex-col md:flex-row-reverse items-center justify-between w-full group">
                        <div class="absolute left-6 md:left-1/2 w-10 h-10 rounded-full bg-primary-dark text-white flex items-center justify-center font-bold ring-4 ring-canvas transform -translate-x-1/2 z-10 transition-all duration-300 group-hover:scale-125">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="w-full pl-16 md:pl-0 md:w-[45%] md:pl-12 text-left">
                            <div class="bg-highlight/10 p-6 md:p-8 rounded-2xl border border-highlight/30 transition-all duration-300 group-hover:-translate-y-1.5 group-hover:shadow-xl">
                                <div class="flex items-center gap-2 mb-2">
                                    <h2 class="font-bold text-xl text-highlight">Keputusan Penetapan Batas</h2>
                                </div>
                                <p class="text-sm text-contrast/70 leading-relaxed">
                                    Sebagai tahap pamungkas, Keputusan tentang Penetapan Batas Areal Kerja PPKH diterbitkan oleh Direktur Jenderal atas nama Menteri.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-[45%]"></div>
                    </div>

                </div>
            </div>

            {{-- 3. CALL TO ACTION (CTA) --}}
            <div class="mt-24 w-full">
                <div class="relative overflow-hidden rounded-3xl bg-contrast shadow-sm p-8 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center justify-between gap-8 group">

                    <div class="relative z-10 text-center md:text-left max-w-xl">
                        <h3 class="font-serif text-2xl lg:text-2xl font-semibold text-white mb-3 tracking-tight">Siap untuk Mengajukan?</h3>
                        <p class="text-secondary text-sm sm:text-base leading-relaxed">
                            Proses permohonan Persetujuan Penggunaan Kawasan Hutan dilakukan sepenuhnya secara elektronik melalui sistem <strong class="text-white">SINERGY</strong> milik Kementerian Lingkungan Hidup dan Kehutanan.
                        </p>
                    </div>

                    <div class="relative z-10 shrink-0 w-full md:w-auto">
                        <a href="https://sinergy.planologi.kehutanan.go.id/" target="_blank" rel="noopener"
                           class="flex items-center justify-center gap-3 w-full md:w-auto px-6 py-4 bg-action hover:bg-action-dark text-contrast rounded-xl font-bold text-sm text-2xl transition-all duration-300 ease-out hover:-translate-y-1">
                            Buka Portal SINERGY
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
