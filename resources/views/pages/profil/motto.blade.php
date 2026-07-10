@extends('layouts.app')

@section('content')

    <x-page-header
        title="Motto"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Motto', 'url' => route('profil.motto')],
        ]"
    />

    {{-- PERNYATAAN BESAR --}}
    <section class="relative overflow-hidden bg-contrast py-14 sm:py-18 lg:py-24">
        <svg class="hidden lg:block absolute -right-20 -top-20 w-96 h-96 opacity-[0.06]" viewBox="0 0 260 260" fill="none" aria-hidden="true">
            <circle cx="130" cy="130" r="20" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="40" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="60" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="95" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="128" stroke="#C89B3C" stroke-width="1"/>
            <circle cx="130" cy="130" r="140" stroke="#C89B3C" stroke-width="1"/>
        </svg>

        <div class="relative mx-auto max-w-4xl px-6 sm:px-8 lg:px-12 text-center">
            <p class="font-mono text-xs text-secondary uppercase tracking-widest mb-8">
                Motto Balai Pemantapan Kawasan Hutan Wilayah XVI
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-6 flex-wrap">
                <span class="font-serif font-medium text-3xl sm:text-5xl lg:text-6xl text-primary-light">Sigap<span class="text-white/20">,</span></span>
                <span class="font-serif font-medium text-3xl sm:text-5xl lg:text-6xl text-action">Berintegritas<span class="text-white/20">,</span></span>
                <span class="font-serif font-medium text-3xl sm:text-5xl lg:text-6xl text-secondary">Melayani</span>
            </div>
        </div>
    </section>

    {{-- PENJABARAN TIAP PILAR --}}
    @php
        $iconPaths = [
            'bolt'  => 'M13 2 4 14h6l-1 8 9-12h-6l1-8z',
            'shield'=> 'M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z M9 12l2 2 4-4',
            'hand'  => 'M7 11V6a2 2 0 114 0v4m0-2V4a2 2 0 114 0v6m0-3a2 2 0 114 0v5m0 0v2a6 6 0 01-6 6h-2a6 6 0 01-5-2.7L4 13a1.7 1.7 0 012.7-2l1.3 1.5',
        ];
        $warnaMap = [
            'primary'   => ['bg' => 'bg-primary',   'text' => 'text-primary',   'soft' => 'bg-primary/10'],
            'highlight' => ['bg' => 'bg-highlight', 'text' => 'text-highlight', 'soft' => 'bg-highlight/10'],
            'secondary' => ['bg' => 'bg-secondary', 'text' => 'text-secondary','soft' => 'bg-secondary/10'],
        ];
    @endphp

    <section class="bg-canvas py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                @foreach ($pilar as $i => $item)
                    @php $warna = $warnaMap[$item['warna']]; @endphp
                    <div class="group rounded-2xl border border-contrast/10 bg-white p-7 sm:p-8
                                transition-all duration-300 ease-smooth hover:-translate-y-1.5 hover:shadow-sm hover:border-secondary">

                        <div class="w-14 h-14 rounded-2xl {{ $warna['soft'] }} flex items-center justify-center mb-6
                                    transition-all duration-300 ease-smooth group-hover:{{ $warna['bg'] }} group-hover:rotate-6">
                            <svg class="w-7 h-7 {{ $warna['text'] }} transition-colors duration-300 group-hover:text-white"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                            </svg>
                        </div>

                        <span class="font-mono text-xs {{ $warna['text'] }} mb-1.5 block">0{{ $i + 1 }}</span>
                        <h2 class="font-serif font-medium text-xl mb-3">{{ $item['kata'] }}</h2>
                        <p class="text-sm text-contrast/70 leading-relaxed mb-5">{{ $item['deskripsi'] }}</p>

                        <div class="pt-5 border-t border-contrast/10">
                            <p class="text-xs font-mono uppercase tracking-wide text-contrast/40 mb-2">Diwujudkan melalui</p>
                            <p class="text-sm text-contrast/60 leading-relaxed">{{ $item['penerapan'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ILUSTRASI PENUTUP --}}
    <section class="bg-white py-14 sm:py-16 lg:py-20 overflow-hidden">
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">
            <div class="rounded-2xl bg-contrast relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center">

                    <div class="p-8 sm:p-10 lg:p-12">
                        <p class="font-mono text-xs text-secondary uppercase tracking-widest mb-4">Komitmen kami</p>
                        <h2 class="font-serif font-medium text-xl sm:text-2xl text-white leading-snug mb-4">
                            Satu motto, tiga arah kerja yang saling menguatkan
                        </h2>
                        <p class="text-sm text-white/70 leading-relaxed">
                            Sigap, Berintegritas, dan Melayani bukan tiga hal terpisah — kecepatan tanpa
                            integritas berisiko, integritas tanpa pelayanan yang baik tidak dirasakan
                            masyarakat. Ketiganya berjalan bersama dalam setiap tugas kami di wilayah
                            kerja Sulawesi Tengah.
                        </p>
                    </div>

                    {{-- Ilustrasi orisinal: tiga simbol saling terhubung --}}
                    <div class="relative h-56 lg:h-full min-h-[220px]">
                        <svg viewBox="0 0 400 300" class="w-full h-full" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
                            <line x1="120" y1="150" x2="200" y2="90" stroke="#6E9B76" stroke-width="1.5" stroke-dasharray="4 4" opacity="0.5"/>
                            <line x1="200" y1="90" x2="280" y2="150" stroke="#6E9B76" stroke-width="1.5" stroke-dasharray="4 4" opacity="0.5"/>
                            <line x1="120" y1="150" x2="280" y2="150" stroke="#6E9B76" stroke-width="1.5" stroke-dasharray="4 4" opacity="0.5"/>

                            {{-- Sigap --}}
                            <circle cx="120" cy="150" r="34" fill="#2F5D45"/>
                            <path d="M124 132 108 156h10l-2 16 16-22h-10l2-18z" fill="#F5F3EC"/>

                            {{-- Berintegritas --}}
                            <circle cx="200" cy="90" r="34" fill="#8B5E34"/>
                            <path d="M200 74l14 6v11c0 9-6 15-14 18-8-3-14-9-14-18V80l14-6z" fill="#F5F3EC"/>
                            <path d="M193 91l5 5 9-9" stroke="#8B5E34" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>

                            {{-- Melayani --}}
                            <circle cx="280" cy="150" r="34" fill="#6E9B76"/>
                            <circle cx="280" cy="142" r="8" fill="#F5F3EC"/>
                            <path d="M264 168c0-9 7-16 16-16s16 7 16 16" stroke="#F5F3EC" stroke-width="3" fill="none" stroke-linecap="round"/>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
