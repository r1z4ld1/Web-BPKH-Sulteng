@extends('layouts.app')

@section('content')

    <x-page-header
        title="Tugas dan Fungsi"
        :breadcrumb="[
            ['label' => 'Tentang', 'url' => route('profil.index')],
            ['label' => 'Tugas dan Fungsi', 'url' => route('profil.tugas-fungsi')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-12">

            {{-- TUGAS --}}
            <div class="mb-16">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 7h6m-6 4h6"/>
                        </svg>
                    </div>
                    <h2 class="font-serif font-medium text-xl sm:text-2xl">Tugas</h2>
                </div>
                <div class="rounded-xl border-l-4 border-primary bg-white p-6 sm:p-8">
                    <p class="text-sm sm:text-base leading-relaxed text-contrast/80">
                        Balai Pemantapan Kawasan Hutan mempunyai tugas melaksanakan pengukuhan kawasan hutan,
                        penyiapan bahan perencanaan kehutanan wilayah, penyiapan data perubahan fungsi dan
                        peruntukan kawasan hutan, dan pengelolaan data dan informasi sumber daya hutan.
                    </p>
                </div>
            </div>

            {{-- FUNGSI --}}
            <div class="mb-16">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-secondary flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="font-serif font-medium text-xl sm:text-2xl">Fungsi</h2>
                </div>

                <div class="space-y-2">
                    @foreach ($fungsi as $i => $item)
                        <div class="group relative flex gap-4 rounded-xl p-4 sm:p-5 border border-transparent
                                    transition-all duration-200 ease-smooth
                                    hover:bg-white hover:border-contrast/10 hover:pl-6">
                            {{-- Aksen kiri muncul saat hover --}}
                            <div class="absolute left-0 top-3 bottom-3 w-0.5 bg-action rounded-full scale-y-0 origin-center
                                        transition-transform duration-200 ease-smooth group-hover:scale-y-100"></div>

                            <span class="font-mono text-xs text-highlight shrink-0 mt-0.5 w-6
                                         transition-colors duration-200 group-hover:text-action">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <p class="text-sm sm:text-base leading-relaxed text-contrast/75
                                      transition-colors duration-200 group-hover:text-contrast">
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- BAGIAN / STRUKTUR --}}
            <div class="mb-16">
                {{-- Header Section --}}
                <div class="flex items-center gap-4 mb-3">
                    {{-- Ikon menggunakan warna Cokelat Tanah (#8B5E34) sebagai aksen --}}
                    <div class="w-10 h-10 rounded-xl bg-[#8B5E34] flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M6 21V5a1 1 0 011-1h4a1 1 0 011 1v16M14 21V9a1 1 0 011-1h4a1 1 0 011 1v12"/>
                        </svg>
                    </div>
                    <h2 class="font-serif font-semibold text-2xl lg:text-3xl text-[#16241C]">Bagian di Lingkungan Kantor</h2>
                </div>

                {{-- Deskripsi dengan margin disesuaikan agar sejajar dengan teks judul --}}
                <p class="text-sm md:text-base text-[#16241C]/70 mb-8 ml-14">
                    Terdiri dari 1 (satu) Eselon III, 3 (tiga) Eselon IV, dan Kelompok Jabatan Fungsional.
                </p>

                {{--
                    Container menggunakan Flexbox (justify-center).
                    Jika item bersisa di baris terakhir, ia akan otomatis rata tengah (centered),
                    mengatasi masalah ruang kosong yang "berat sebelah".
                --}}
                <div class="flex flex-wrap justify-center gap-4 md:gap-5">
                    @foreach ($bagian as $item)
                        {{--
                            Lebar Kartu:
                            - Mobile: w-full (100%)
                            - Tablet: w-[calc(50%-0.625rem)] (50% dikurangi setengah gap)
                            - Desktop: lg:w-[calc(33.333%-0.85rem)] (33% dikurangi persentase gap)
                        --}}
                        <div class="group relative flex items-center gap-4 w-full sm:w-[calc(50%-0.625rem)] lg:w-[calc(33.333%-0.85rem)]
                                    bg-white rounded-xl p-4 md:p-5 shadow-sm border border-[#16241C]/5
                                    transition-all duration-300 ease-in-out hover:shadow-md hover:-translate-y-1 overflow-hidden">

                            {{-- Indikator garis tepi kiri (Hijau Lumut -> Emas Senja saat dihover) --}}
                            <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-[#6E9B76] group-hover:bg-[#C89B3C] transition-colors duration-300"></div>

                            {{-- Badge Kode Bagian (Hijau Tajuk Hutan) --}}
                            <span class="shrink-0 font-mono text-[11px] md:text-xs font-bold uppercase tracking-wider text-white bg-[#2F5D45] rounded-md px-3 py-1.5 shadow-sm">
                                {{ $item['kode'] }}
                            </span>

                            {{-- Nama Bagian --}}
                            <span class="text-sm md:text-base font-medium text-[#16241C] group-hover:text-[#2F5D45] transition-colors duration-300">
                                {{ $item['nama'] }}
                            </span>

                        </div>
                    @endforeach
                </div>
            </div>

           {{-- WILAYAH KERJA --}}
            <div class="mb-16">
                {{-- Header Section --}}
                <div class="flex items-center gap-4 mb-3">
                    {{-- Ikon menggunakan warna Emas Senja (#C89B3C) sebagai penanda lokasi --}}
                    <div class="w-10 h-10 rounded-xl bg-[#C89B3C] flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h2 class="font-serif font-semibold text-2xl lg:text-3xl text-[#16241C]">Wilayah Kerja</h2>
                </div>
                <p class="text-sm md:text-base text-[#16241C]/70 mb-8 ml-14">Provinsi Sulawesi Tengah — 1 kota dan 12 kabupaten.</p>

                <div class="space-y-5">

                    {{-- KATEGORI 1: Pusat Wilayah / Kota (Item Pertama dari Array) --}}
                    @foreach ($wilayahKerja as $wilayah)
                        @if ($loop->first)
                            <div class="group relative bg-white p-5 rounded-xl border border-[#2F5D45]/20 shadow-sm overflow-hidden
                                        transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">

                                {{-- Aksen dekoratif latar belakang --}}
                                <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-[#2F5D45]/5 to-transparent pointer-events-none"></div>
                                {{-- Garis highlight vertikal Emas Senja --}}
                                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-[#C89B3C]"></div>

                                <div class="flex items-center gap-4 pl-2">
                                    <div class="w-10 h-10 rounded-lg bg-[#2F5D45]/10 flex items-center justify-center text-[#2F5D45] shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] md:text-xs font-bold uppercase tracking-wider text-[#C89B3C] mb-0.5">Ibu Kota / Pusat Wilayah</span>
                                        <h3 class="font-serif font-bold text-lg md:text-xl text-[#16241C] group-hover:text-[#2F5D45] transition-colors">
                                            {{ $wilayah }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- KATEGORI 2: Grid 12 Kabupaten Sisa --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($wilayahKerja as $wilayah)
                            @if (!$loop->first)
                                <div class="group flex items-center gap-3.5 bg-white p-4 rounded-xl border border-[#16241C]/5 shadow-sm
                                            transition-all duration-300 hover:border-[#6E9B76] hover:shadow-md hover:-translate-y-1">

                                    {{-- Simbol Pin Kecil (Hijau Lumut yang bertransisi ke Hijau Pekat saat hover) --}}
                                    <div class="w-8 h-8 rounded-lg bg-[#F5F3EC] flex items-center justify-center shrink-0
                                                text-[#6E9B76] group-hover:bg-[#2F5D45]/10 group-hover:text-[#2F5D45] transition-all duration-300">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                    </div>

                                    <span class="text-sm md:text-base font-medium text-[#16241C]/90 group-hover:text-[#2F5D45] transition-colors duration-300">
                                        {{ $wilayah }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
            {{-- UNDUH PERATURAN --}}
            <div class="rounded-xl bg-contrast p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center gap-5 sm:gap-6 justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-white/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 3H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V8l-5-5z M14 3v5h5"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Peraturan Menteri Nomor 3 Tahun 2025</p>
                        <p class="text-xs text-secondary mt-0.5">Tentang Organisasi dan Tata Kerja Balai Pemantapan Kawasan Hutan</p>
                    </div>
                </div>
                <a href="{{ asset('documents/PERMENHUT_3_2025.pdf') }}"
                   target="_blank"
                   rel="noopener"
                   class="inline-flex items-center justify-center gap-2 rounded-lg bg-action px-5 py-2.5 text-sm font-medium text-contrast shrink-0
                          transition-all duration-200 ease-smooth hover:bg-action-dark hover:-translate-y-0.5">
                    Unduh PDF
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/>
                    </svg>
                </a>
            </div>

        </div>
    </section>

@endsection
