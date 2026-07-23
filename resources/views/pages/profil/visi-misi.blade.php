@extends('layouts.app')

@section('content')

    <x-page-header
        title="Visi, Misi dan Tujuan"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Visi, Misi dan Tujuan', 'url' => route('profil.visi-misi')],
        ]"
    />


   {{-- VISI - panel gelap dengan kutipan besar --}}
    <section class="relative overflow-hidden bg-contrast py-14 sm:py-18 lg:py-24">
        <svg class="hidden lg:block absolute -left-16 -bottom-16 w-80 h-80  opacity-10 transition-transform duration-1000 hover:scale-105 hover:rotate-3" viewBox="0 0 260 260" fill="none" aria-hidden="true">
            <circle cx="130" cy="130" r="20" stroke="#F5F3EC" stroke-width="1" stroke-dasharray="4 4" class="animate-[spin_20s_linear_infinite] origin-center"/>
            <circle cx="130" cy="130" r="40" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="60" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="95" stroke="#F5F3EC" stroke-width="1"/>
            <circle cx="130" cy="130" r="128" stroke="#C89B3C" stroke-width="1"/>
            <circle cx="130" cy="130" r="140" stroke="#C89B3C" stroke-width="1" stroke-dasharray="8 8" class="animate-[spin_30s_linear_infinite_reverse] origin-center"/>
        </svg>

        <div  class="relative mx-auto max-w-4xl px-6 sm:px-8 lg:px-12 text-center z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                 <p class="font-mono text-xs text-secondary uppercase tracking-widest">
                Visi Balai Pemantapan Kawasan Hutan Wilayah XVI
                 </p>
            </div>

            <svg class="w-8 h-8 text-action/40 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9.5 6C6.5 6 4 8.5 4 11.5c0 2.8 2.1 5 4.8 5.3-.3 1.4-1.3 2.6-2.8 3.2l.4 1.5c3.1-.8 5.1-3.2 5.1-6.5V11c0-2.8-2-5-4-5zm10 0c-3 0-5.5 2.5-5.5 5.5 0 2.8 2.1 5 4.8 5.3-.3 1.4-1.3 2.6-2.8 3.2l.4 1.5c3.1-.8 5.1-3.2 5.1-6.5V11c0-2.8-2-5-4-5z" opacity=".85"/>
            </svg>

            <h1 class="font-serif font-medium text-2xl sm:text-3xl lg:text-4xl leading-snug text-white">
                Memastikan pemantapan dan optimasi kawasan hutan untuk mengawal
                penguatan fondasi transformasi untuk Indonesia Maju
            </h1>
        </div>
    </section>

    {{-- MAKNA VISI --}}
    <section class="bg-canvas py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($maknaVisi as $i => $item)
                    <div class="group relative rounded-xl border border-contrast/10 bg-white p-6
                                transition-all duration-300 ease-smooth hover:-translate-y-1.5 hover:shadow-sm hover:border-secondary">
                        <span class="font-mono text-4xl text-primary/10 font-medium leading-none
                                     transition-colors duration-300 group-hover:text-action/20">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <h3 class="font-serif font-medium text-lg mt-3 mb-2">{{ $item['judul'] }}</h3>
                        <p class="text-sm text-contrast/65 leading-relaxed">{{ $item['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

   {{-- MISI --}}
    @php
        $misiIcons = [
            'leaf'    => 'M12 21c-4-1-7-4-7-9 0-3 1.5-5.5 4-7 1 3 3 4 5 4 .5-2 .2-4-1-6 4 1 7 4 7 9 0 5-3 8-8 9z',
            'bolt'    => 'M13 2 4 14h6l-1 8 9-12h-6l1-8z',
            'refresh' => 'M4 4v5h5M20 20v-5h-5M5.6 9a7 7 0 0112.7-2.3M18.4 15a7 7 0 01-12.7 2.3',
        ];
    @endphp

    <section class="bg-white py-14 sm:py-16 lg:py-20 relative">
        <div class="mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">
            <div class="flex items-center gap-3 mb-10 group">
                <div class="w-8 h-8 rounded-xl bg-primary flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:rotate-12 group-hover:scale-110 shadow-lg shadow-primary/20">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="font-serif text-4xl lg:text-2xl font-semibold">Misi</h2>
            </div>

            <div class="space-y-5">
                @foreach ($misi as $item)
                    {{-- Efek garis vertikal tumbuh di sisi kiri saat hover --}}
                    <div class="group relative flex flex-col sm:flex-row gap-6 overflow-hidden rounded-2xl border border-contrast/10 bg-canvas p-6 lg:p-7
                                transition-all duration-500 ease-smooth hover:bg-white hover:shadow-xl hover:shadow-primary/5 hover:border-transparent">

                        {{-- Aksen Garis Kiri yang Tumbuh --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary origin-top scale-y-0 transition-transform duration-500 ease-out group-hover:scale-y-100"></div>

                        {{-- Ikon Box --}}
                        <div class="relative w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center shrink-0
                                    transition-all duration-500 group-hover:bg-primary group-hover:shadow-md group-hover:shadow-primary/40">
                            <svg class="w-6 h-6 text-primary transition-all duration-500 group-hover:text-white group-hover:scale-110 group-hover:-rotate-6"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $misiIcons[$item['icon']] }}"/>
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h3 class="font-medium text-lg sm:text-xl mb-2 text-contrast transition-colors duration-300 group-hover:text-primary">{{ $item['judul'] }}</h3>
                            <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">{{ $item['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TUJUAN --}}
    <section class="bg-canvas py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">
            <div class="flex items-center gap-2 mb-8">
                <div class="w-8 h-8 rounded-lg bg-action flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-contrast" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"/>
                        <circle cx="12" cy="12" r="4.5"/>
                        <circle cx="12" cy="12" r="1"/>
                    </svg>
                </div>
                <h2 class="font-serif font-medium text-xl sm:text-2xl">Tujuan</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($tujuan as $item)
                    <div class="group relative overflow-hidden rounded-xl border border-contrast/10 bg-white p-6
                                transition-all duration-300 ease-smooth hover:-translate-y-1 hover:border-secondary">

                        <div class="relative">
                            <span class="font-mono text-xs text-highlight">{{ $item['nomor'] }}</span>
                            <h3 class="font-serif font-medium text-lg mt-1.5 mb-2">{{ $item['judul'] }}</h3>
                            <p class="text-sm text-contrast/65 leading-relaxed">{{ $item['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
