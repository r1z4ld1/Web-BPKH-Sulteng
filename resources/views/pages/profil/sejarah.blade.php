@extends('layouts.app')

@section('content')

    {{-- <x-page-header
        title="Sejarah"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Sejarah', 'url' => route('profil.sejarah')],
        ]"
    /> --}}

    {{-- Latar krem hangat (#F5F3EC) dan teks hijau tinta gelap (#16241C) --}}
    <section class="bg-[#F5F3EC] py-16 lg:py-24 overflow-hidden text-[#16241C]">
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">

            {{-- Judul Halaman Tengah --}}
            <div class="text-center mb-16 lg:mb-24">
                <h2 class="font-serif text-4xl lg:text-5xl font-semibold">Sejarah</h2>
            </div>

            <div class="relative w-full">
                {{-- Garis Tengah (Hijau Lumut #6E9B76) --}}
                <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-[2px] bg-[#6E9B76] md:-translate-x-1/2 rounded-full opacity-40"></div>

                <div class="space-y-12 md:space-y-16">
                    @foreach ($milestones as $item)
                        {{-- Wrapper Group untuk memicu Hover Effect pada semua elemen dalam satu baris --}}
                        <div class="relative flex flex-col md:flex-row items-center justify-between w-full group min-h-[120px]">

                            {{-- Titik Penanda (Hijau Tajuk Hutan #2F5D45) - Akan membesar dan berubah ke Emas Senja saat dihover --}}
                            <div class="absolute left-6 md:left-1/2 w-4 h-4 rounded-full bg-[#2F5D45] shadow-[0_0_0_8px_#F5F3EC] transform -translate-x-1/2 z-10
                                        transition-all duration-300 ease-in-out group-hover:scale-150 group-hover:bg-[#C89B3C]">
                            </div>

                            @if($loop->odd)
                                {{-- KIRI: Teks Tahun (Desktop/Tablet) --}}
                                <div class="hidden md:flex w-5/12 justify-end pr-14">
                                    <span class="text-2xl font-serif font-medium transition-colors duration-300 group-hover:text-[#2F5D45]">{{ $item['tahun'] }}</span>
                                </div>

                                {{-- KANAN: Kartu Konten --}}
                                <div class="w-full pl-16 md:pl-0 md:w-5/12 md:ml-auto">
                                    {{-- Efek Hover pada Kartu: Terangkat ke atas (-translate-y-1.5) dan bayangan membesar --}}
                                    <div class="relative bg-white p-6 md:p-7 rounded-xl shadow-sm border-l-[6px] border-[#2F5D45]
                                                transition-all duration-300 ease-in-out group-hover:-translate-y-1.5 group-hover:shadow-lg">

                                        {{-- Panah Menunjuk ke Kiri --}}
                                        <div class="absolute top-[22px] -left-[14px] w-0 h-0 border-y-[10px] border-y-transparent border-r-[10px] border-r-[#2F5D45]"></div>

                                        {{-- Teks Tahun (Smartphone Only) --}}
                                        <span class="md:hidden block text-xl font-serif font-medium mb-2 text-[#2F5D45]">{{ $item['tahun'] }}</span>

                                        <h3 class="font-serif font-semibold text-lg md:text-xl mb-2">{{ $item['judul'] }}</h3>
                                        <p class="text-[#16241C]/80 text-sm md:text-base leading-relaxed">{{ $item['deskripsi'] }}</p>
                                    </div>
                                </div>
                            @else
                                {{-- KIRI: Kartu Konten (Desktop/Tablet) --}}
                                <div class="w-full pl-16 md:pl-0 md:w-5/12 md:mr-auto">
                                    {{-- Efek Hover pada Kartu --}}
                                    <div class="relative bg-white p-6 md:p-7 rounded-xl shadow-sm border-l-[6px] md:border-l-0 md:border-r-[6px] border-[#2F5D45]
                                                transition-all duration-300 ease-in-out group-hover:-translate-y-1.5 group-hover:shadow-lg">

                                        {{-- Panah Smartphone (Menunjuk Kiri) --}}
                                        <div class="md:hidden absolute top-[22px] -left-[14px] w-0 h-0 border-y-[10px] border-y-transparent border-r-[10px] border-r-[#2F5D45]"></div>

                                        {{-- Panah Desktop/Tablet (Menunjuk Kanan) --}}
                                        <div class="hidden md:block absolute top-[22px] -right-[14px] w-0 h-0 border-y-[10px] border-y-transparent border-l-[10px] border-l-[#2F5D45]"></div>

                                        {{-- Teks Tahun (Smartphone Only) --}}
                                        <span class="md:hidden block text-xl font-serif font-medium mb-2 text-[#2F5D45]">{{ $item['tahun'] }}</span>

                                        <h3 class="font-serif font-semibold text-lg md:text-xl mb-2">{{ $item['judul'] }}</h3>
                                        <p class="text-[#16241C]/80 text-sm md:text-base leading-relaxed">{{ $item['deskripsi'] }}</p>
                                    </div>
                                </div>

                                {{-- KANAN: Teks Tahun (Desktop/Tablet) --}}
                                <div class="hidden md:flex w-5/12 justify-start pl-14">
                                    <span class="text-2xl font-serif font-medium transition-colors duration-300 group-hover:text-[#2F5D45]">{{ $item['tahun'] }}</span>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

@endsection
