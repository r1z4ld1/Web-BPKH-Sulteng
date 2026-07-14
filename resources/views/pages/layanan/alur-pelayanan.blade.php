@extends('layouts.app')

@section('content')

    <x-page-header
        title="Alur Pelayanan"
        :breadcrumb="[
            ['label' => 'Layanan', 'url' => route('layanan.alur')],
            ['label' => 'Alur Pelayanan', 'url' => route('layanan.alur')],
        ]"
    />

    @php
        $iconPaths = [
            'document' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'check'    => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            'clock'    => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'send'     => 'M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z',
            'star'     => 'M12 2.5l3 6.3 6.8.9-5 4.9 1.3 6.9L12 18l-6.1 3.4 1.3-6.9-5-4.9 6.8-.9L12 2.5z',
        ];
    @endphp

    <section class="relative bg-canvas py-16 sm:py-20 lg:py-24 overflow-hidden">
        {{-- Elemen Dekoratif Latar Belakang (Opsional, memberi kesan premium) --}}
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-primary/5 to-transparent pointer-events-none"></div>

        <div class="relative mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">

            {{-- ===== HEADER & TITLE SEPERTI BANNER ===== --}}
            <div class="max-w-3xl mb-12 sm:mb-16">
                <h1 class="font-sans font-black text-3xl sm:text-4xl lg:text-5xl text-gray-900 tracking-tight uppercase leading-[1.1] mb-6">
                    Bagaimana Alur Proses Pelayanan <br class="hidden sm:block">
                    <span class="text-primary">BPKH Wilayah XVI Palu?</span>
                </h1>

                <p class="text-base sm:text-lg text-contrast/70 leading-relaxed mb-8">
                    Transparansi adalah komitmen kami. Berikut adalah tahapan proses pelayanan Balai Pemantapan Kawasan Hutan Wilayah XVI Palu, dari pengajuan permohonan hingga survei kepuasan masyarakat.
                </p>

                {{-- Legend / Keterangan Aktor --}}
                <div class="flex flex-wrap items-center gap-3">
                    <div class="flex items-center gap-2 rounded-full bg-white shadow-sm border border-primary/10 px-4 py-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-xs font-semibold text-primary uppercase tracking-wide">Pemohon</span>
                    </div>
                    <div class="flex items-center gap-2 rounded-full bg-white shadow-sm border border-highlight/10 px-4 py-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-highlight animate-pulse"></span>
                        <span class="text-xs font-semibold text-highlight uppercase tracking-wide">Staf Pelayanan</span>
                    </div>
                </div>
            </div>

            {{-- ===== DESKTOP: Stepper Horizontal (Hanya di layar besar 'lg' ke atas) ===== --}}
            <div class="hidden lg:grid grid-cols-5 gap-6 mb-16 relative">
                {{-- Garis Penghubung Belakang --}}
                <div class="absolute top-7 left-[10%] right-[10%] h-[2px] bg-gradient-to-r from-primary/20 via-highlight/20 to-primary/20 z-0 border-t-2 border-dashed border-contrast/15"></div>

                @foreach ($langkah as $i => $item)
                    @php $isPemohon = $item['aktor'] === 'Pemohon'; @endphp
                    <div class="relative z-10 flex flex-col items-center group">

                        {{-- Lingkaran Nomor --}}
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-5 ring-8 ring-canvas shadow-md transition-transform duration-300 group-hover:scale-110
                                    {{ $isPemohon ? 'bg-primary text-white' : 'bg-highlight text-white' }}">
                            <span class="font-mono text-lg font-bold">{{ $i + 1 }}</span>
                        </div>

                        {{-- Kartu Konten --}}
                        <div class="rounded-2xl border border-contrast/5 bg-white p-5 w-full flex flex-col items-center text-center shadow-sm
                                    transition-all duration-300 ease-out group-hover:shadow-xl group-hover:-translate-y-2 relative overflow-hidden
                                    {{ $isPemohon ? 'group-hover:border-primary/30 group-hover:shadow-primary/10' : 'group-hover:border-highlight/30 group-hover:shadow-highlight/10' }}">

                            {{-- Aksen Garis Atas Kartu --}}
                            <div class="absolute top-0 left-0 w-full h-1 {{ $isPemohon ? 'bg-primary/80' : 'bg-highlight/80' }}"></div>

                            <div class="w-10 h-10 rounded-full {{ $isPemohon ? 'bg-primary/10' : 'bg-highlight/10' }} flex items-center justify-center mb-3">
                                <svg class="w-5 h-5 {{ $isPemohon ? 'text-primary' : 'text-highlight' }}"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                                </svg>
                            </div>

                            <span class="font-bold text-[10px] uppercase tracking-widest mb-1.5
                                         {{ $isPemohon ? 'text-primary' : 'text-highlight' }}">
                                {{ $item['aktor'] }}
                            </span>

                            <h3 class="font-semibold text-gray-800 text-sm leading-snug mb-2">{{ $item['judul'] }}</h3>
                            <p class="text-xs text-contrast/60 leading-relaxed">{{ $item['deskripsi'] }}</p>

                            @if (count($item['kanal']) > 0)
                                <div class="flex flex-wrap justify-center gap-1.5 mt-4 pt-3 border-t border-contrast/5 w-full">
                                    @foreach ($item['kanal'] as $kanal)
                                        <span class="text-[10px] font-medium rounded-md bg-secondary/10 text-secondary px-2 py-1">{{ $kanal }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ===== MOBILE & TABLET: Stepper Vertikal ===== --}}
            <div class="lg:hidden relative mb-12">
                {{-- Garis Vertikal Utama --}}
                <div class="absolute left-[1.35rem] sm:left-7 top-4 bottom-4 w-[2px] bg-contrast/10 border-l-2 border-dashed border-contrast/15"></div>

                <div class="space-y-6 sm:space-y-8">
                    @foreach ($langkah as $i => $item)
                        @php $isPemohon = $item['aktor'] === 'Pemohon'; @endphp
                        <div class="relative pl-14 sm:pl-20 group cursor-default">

                            {{-- Lingkaran Nomor --}}
                            <div class="absolute left-0 sm:left-2 top-0 w-11 h-11 sm:w-12 sm:h-12 rounded-full flex items-center justify-center ring-4 sm:ring-8 ring-canvas shadow-sm z-10 transition-transform duration-300 group-hover:scale-110
                                        {{ $isPemohon ? 'bg-primary text-white' : 'bg-highlight text-white' }}">
                                <span class="font-mono text-sm sm:text-base font-bold">{{ $i + 1 }}</span>
                            </div>

                            {{-- Kartu Konten --}}
                            <div class="rounded-2xl border border-contrast/5 bg-white p-5 sm:p-6 shadow-sm transition-all duration-300 group-hover:shadow-md relative overflow-hidden">
                                {{-- Aksen Garis Kiri Kartu --}}
                                <div class="absolute top-0 left-0 w-1 h-full {{ $isPemohon ? 'bg-primary/80' : 'bg-highlight/80' }}"></div>

                                <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="font-bold text-[10px] sm:text-xs uppercase tracking-widest px-2 py-1 rounded-md bg-opacity-10
                                                         {{ $isPemohon ? 'text-white bg-primary' : 'text-white bg-highlight' }}">
                                                {{ $item['aktor'] }}
                                            </span>
                                        </div>

                                        <h3 class="font-semibold text-gray-800 text-base mb-1.5 flex items-center gap-2">
                                            <svg class="w-4 h-4 {{ $isPemohon ? 'text-primary' : 'text-highlight' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                                            </svg>
                                            {{ $item['judul'] }}
                                        </h3>

                                        <p class="text-sm text-contrast/60 leading-relaxed">{{ $item['deskripsi'] }}</p>

                                        @if (count($item['kanal']) > 0)
                                            <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-contrast/5">
                                                @foreach ($item['kanal'] as $kanal)
                                                    <span class="text-xs font-medium rounded-md bg-secondary/10 text-secondary px-2.5 py-1">{{ $kanal }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ===== BAGIAN BAWAH & CTA ===== --}}
            <div class="flex items-start sm:items-center gap-3 mb-10 p-4 rounded-xl bg-yellow-500/10 border border-yellow-500/20">
                <svg class="w-6 h-6 text-yellow-600 shrink-0 mt-0.5 sm:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-yellow-800 font-medium leading-relaxed">
                    Estimasi waktu penyelesaian layanan adalah <strong class="font-bold">5 (lima) hari kerja</strong>, atau menyesuaikan dengan Standar Operasional Prosedur (SOP) pada masing-masing jenis layanan spesifik.
                </p>
            </div>

            {{-- CTA --}}
            <div class="rounded-2xl bg-gradient-to-br from-primary to-gray-900 p-8 sm:p-10 shadow-2xl flex flex-col md:flex-row md:items-center gap-6 justify-between relative overflow-hidden">
                {{-- Aksen Dekoratif pada CTA --}}
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5 blur-3xl"></div>

                <div class="relative z-10">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">Siap mengajukan layanan?</h3>
                    <p class="text-sm sm:text-base text-gray-400 max-w-lg">Sampaikan permohonan Anda secara mudah melalui POS, Email resmi, atau secara digital melalui formulir SIPADU-16.</p>
                </div>

                <a href="{{--{{ route('layanan.pelayanan-terpadu') }} --}}"
                   class="relative z-10 inline-flex items-center justify-center gap-2 rounded-xl bg-action px-8 py-4 text-sm font-bold text-contrast shrink-0
                          transition-all duration-300 hover:bg-white hover:text-action hover:shadow-lg hover:-translate-y-1 group">
                    Ajukan Layanan Sekarang
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                    </svg>
                </a>
            </div>

        </div>
    </section>

@endsection
