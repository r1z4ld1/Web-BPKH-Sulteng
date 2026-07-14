@extends('layouts.app')

@section('content')

    {{-- Latar krem hangat (#F5F3EC) dan teks hijau tinta gelap (#16241C) --}}
    <section class="bg-[#F5F3EC] py-16 lg:py-24 overflow-hidden text-[#16241C]">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">

            {{-- ========================================== --}}
            {{-- 1. HEADER HALAMAN                          --}}
            {{-- ========================================== --}}
            <div class="text-center mb-16 lg:mb-20">
                <span class="font-mono text-xs text-[#2F5D45] uppercase tracking-widest mb-3 block font-bold">Jejak Langkah</span>
                <h2 class="font-serif text-4xl lg:text-5xl font-semibold">Sejarah Kepemimpinan</h2>
                <p class="mt-4 text-sm sm:text-base text-[#16241C]/70 max-w-2xl mx-auto">
                    Mengenang kembali dedikasi dan masa bakti para Kepala Balai yang telah memimpin
                    dan membangun BPKH Wilayah XVI Palu dari masa ke masa.
                </p>
            </div>


          {{-- ========================================== --}}
            {{-- 2. SECTION BARU: GALERI KEPEMIMPINAN       --}}
            {{-- ========================================== --}}
            <div class="mb-24 lg:mb-32">

                @php
                    // Asumsi $milestones berisi 7 data yang berurutan.
                    $allLeaders = collect($milestones)->values();

                    // 1. Ambil elemen terakhir sebagai periode 7 (Saat ini)
                    $currentLeader = $allLeaders->last();
                    // Hardcode foto khusus periode 7
                    $currentLeaderImage = asset('images/foto-Kbalai/Kbalai-P07.png');

                    // 2. Sisa 6 elemen untuk periode 1 hingga 6
                    $previousLeaders = $allLeaders->take(6);
                @endphp

                <!-- ============================================== -->
                <!-- LAYER 1: KEPALA BALAI SAAT INI (1 ITEM PUNCAK) -->
                <!-- ============================================== -->
                <div class="flex justify-center mb-12 lg:mb-16">
                    <div class="w-full max-w-[280px] group flex flex-col relative z-10">
                        {{-- Label Khusus Periode 7 --}}
                        <div class="absolute -top-4 inset-x-0 flex justify-center z-20">
                            <span class="bg-gradient-to-r from-[#C89B3C] to-[#8B5E34] text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md uppercase tracking-wider border border-white/20">
                                Kepala Balai Saat Ini (Periode 7)
                            </span>
                        </div>

                        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_8px_30px_-4px_rgba(200,155,60,0.15)] ring-2 ring-[#C89B3C] flex flex-col h-full
                                    transition-all duration-500 ease-out group-hover:-translate-y-2 group-hover:shadow-[0_20px_40px_-10px_rgba(200,155,60,0.25)]">

                            {{-- Foto Clickable Khusus Periode 7 --}}
                            <div class="relative w-full aspect-[3/4] overflow-hidden bg-[#F5F3EC] cursor-pointer"
                                 onclick="openLightbox('{{ $currentLeaderImage }}', '{{ $currentLeader['judul'] }}', '{{ $currentLeader['deskripsi'] }}', '{{ $currentLeader['tahun'] }}')">
                                <img src="{{ $currentLeaderImage }}" alt="Foto {{ $currentLeader['judul'] }}"
                                     class="w-full h-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-105"
                                     onerror="this.src='{{ asset('images/placeholder-profile.png') }}'">

                                {{-- Overlay Hitam & Ikon Zoom --}}
                                <div class="absolute inset-0 bg-[#16241C]/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[1px]">
                                    <div class="bg-white/20 backdrop-blur-md p-3 rounded-full text-white transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                                    </div>
                                </div>

                                {{-- Badge Tahun --}}
                                <div class="absolute bottom-4 left-4 z-10 pointer-events-none">
                                    <span class="inline-flex items-center px-3 py-1.5 bg-white/90 backdrop-blur-md text-[#2F5D45] text-xs font-mono font-bold tracking-wider rounded-lg shadow-sm border border-[#C89B3C]/30">
                                        {{ $currentLeader['tahun'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Info Teks --}}
                            <div class="p-5 flex flex-col flex-1 bg-gradient-to-b from-white to-[#C89B3C]/5 relative">
                                <h3 class="font-serif font-bold text-lg text-[#16241C] mb-2 leading-snug group-hover:text-[#C89B3C] transition-colors duration-300">
                                    {{ $currentLeader['judul'] }}
                                </h3>
                                <div class="w-8 h-[2px] bg-[#C89B3C] mb-3 group-hover:w-16 transition-all duration-500 rounded-full"></div>
                                <p class="text-xs sm:text-sm text-[#16241C]/75 leading-relaxed font-sans mt-auto">
                                    {{ $currentLeader['deskripsi'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================== -->
                <!-- LAYER 2 & 3: PERIODE 1-6 (GRID 3 KOLOM x 2 BARIS) -->
                <!-- ============================================== -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 justify-items-center max-w-5xl mx-auto">
                    {{-- Tambahkan $index untuk mendapatkan nomor urutan (0 sampai 5) --}}
                    @foreach ($previousLeaders as $index => $item)
                        @php
                            // Format nomor menjadi 01, 02, 03, dst. ($index + 1 karena array dimulai dari 0)
                            $nomorFormat = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            // Ambil nama foto P01 sampai P06
                            $itemImage = asset('images/foto-Kbalai/Kbalai-P' . $nomorFormat . '.JPG');
                        @endphp

                        <div class="w-full max-w-[240px] group flex flex-col">
                            <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_15px_-4px_rgba(22,36,28,0.05)] border border-[#2F5D45]/10 flex flex-col h-full relative
                                        transition-all duration-500 ease-out group-hover:shadow-[0_15px_30px_-10px_rgba(47,93,69,0.15)] group-hover:-translate-y-2">

                                {{-- Foto Clickable untuk Periode 1-6 --}}
                                <div class="relative w-full aspect-[3/4] overflow-hidden bg-[#F5F3EC] cursor-pointer"
                                     onclick="openLightbox('{{ $itemImage }}', '{{ $item['judul'] }}', '{{ $item['deskripsi'] }}', '{{ $item['tahun'] }}')">
                                    <img src="{{ $itemImage }}" alt="Foto {{ $item['judul'] }}"
                                         class="w-full h-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-105"
                                         onerror="this.src='{{ asset('images/placeholder-profile.png') }}'">

                                    {{-- Overlay Hitam & Ikon Zoom --}}
                                    <div class="absolute inset-0 bg-[#16241C]/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[1px]">
                                        <div class="bg-white/20 backdrop-blur-md p-2.5 rounded-full text-white transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                                        </div>
                                    </div>

                                    {{-- Badge Tahun --}}
                                    <div class="absolute bottom-4 left-4 z-10 pointer-events-none">
                                        <span class="inline-flex items-center px-2.5 py-1 bg-white/90 backdrop-blur-md text-[#2F5D45] text-[10px] font-mono font-bold tracking-wider rounded-md shadow-sm border border-[#2F5D45]/10">
                                            {{ $item['tahun'] }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Info Teks --}}
                                <div class="p-4 flex flex-col flex-1 bg-gradient-to-b from-white to-[#F5F3EC]/20">
                                    <h3 class="font-serif font-bold text-base text-[#16241C] mb-2 leading-tight group-hover:text-[#2F5D45] transition-colors duration-300">
                                        {{ $item['judul'] }}
                                    </h3>
                                    <div class="w-6 h-[2px] bg-[#6E9B76]/50 mb-2.5 group-hover:w-10 group-hover:bg-[#2F5D45] transition-all duration-500 rounded-full"></div>
                                    <p class="text-xs text-[#16241C]/70 leading-relaxed font-sans mt-auto line-clamp-3">
                                        {{ $item['deskripsi'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ========================================== --}}
            {{-- MODAL LIGHTBOX (DISEMBUNYIKAN DEFAULT)     --}}
            {{-- ========================================== --}}
            <div id="galleryLightbox" class="fixed inset-0 z-[100] hidden items-center justify-center px-4" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                {{-- Background Hitam Blur --}}
                <div class="fixed inset-0 bg-[#16241C]/90 backdrop-blur-sm transition-opacity opacity-0" id="lightboxBg" onclick="closeLightbox()"></div>

                {{-- Kontainer Gambar --}}
                <div class="relative z-10 max-w-3xl w-full flex flex-col items-center transform scale-95 opacity-0 transition-all duration-300 ease-out" id="lightboxContent">
                    {{-- Tombol Tutup --}}
                    <button onclick="closeLightbox()" class="absolute -top-12 right-0 md:-right-12 text-white hover:text-[#C89B3C] transition-colors p-2 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    {{-- Gambar Full --}}
                    <img id="lightboxImg" src="" alt="Zoomed Foto" class="w-auto max-h-[70vh] object-contain rounded-xl shadow-2xl border border-white/10">

                    {{-- Teks Deskripsi Bawah Modal --}}
                    <div class="bg-white rounded-xl p-5 mt-4 w-full max-w-lg text-center shadow-xl border-t-4 border-[#C89B3C]">
                        <span id="lightboxTahun" class="text-xs font-mono font-bold text-[#C89B3C] tracking-widest uppercase mb-1 block"></span>
                        <h4 id="lightboxTitle" class="font-serif text-xl font-bold text-[#16241C] mb-2"></h4>
                        <p id="lightboxDesc" class="text-sm text-[#16241C]/70 leading-relaxed"></p>
                    </div>
                </div>
            </div>


            {{-- ========================================== --}}
            {{-- 3. SECTION LAMA: TIMELINE (GARIS WAKTU)    --}}
            {{-- ========================================== --}}

            {{-- Pemisah Visual Opsional --}}
            <div class="text-center mb-16 relative">
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-px bg-[#16241C]/10"></div>
                <span class="relative z-10 bg-[#F5F3EC] px-4 font-serif text-2xl font-semibold text-[#16241C]/80">Perjalanan Waktu</span>
            </div>

            <div class="relative w-full max-w-5xl mx-auto">
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

    {{-- ========================================== --}}
            {{-- SCRIPT JAVASCRIPT UNTUK MODAL              --}}
            {{-- ========================================== --}}
            <script>
                function openLightbox(imgSrc, title, desc, tahun) {
                    const lightbox = document.getElementById('galleryLightbox');
                    const bg = document.getElementById('lightboxBg');
                    const content = document.getElementById('lightboxContent');

                    // Set Data
                    document.getElementById('lightboxImg').src = imgSrc;
                    document.getElementById('lightboxTitle').innerText = title;
                    document.getElementById('lightboxDesc').innerText = desc;
                    document.getElementById('lightboxTahun').innerText = tahun;

                    // Tampilkan Modal
                    lightbox.classList.remove('hidden');
                    lightbox.classList.add('flex');

                    // Trigger Animasi Masuk (Slight delay agar transisi CSS berjalan)
                    setTimeout(() => {
                        bg.classList.remove('opacity-0');
                        content.classList.remove('scale-95', 'opacity-0');
                        content.classList.add('scale-100', 'opacity-100');
                    }, 10);

                    // Mencegah scroll body
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    const lightbox = document.getElementById('galleryLightbox');
                    const bg = document.getElementById('lightboxBg');
                    const content = document.getElementById('lightboxContent');

                    // Trigger Animasi Keluar
                    bg.classList.add('opacity-0');
                    content.classList.remove('scale-100', 'opacity-100');
                    content.classList.add('scale-95', 'opacity-0');

                    // Sembunyikan setelah animasi selesai
                    setTimeout(() => {
                        lightbox.classList.add('hidden');
                        lightbox.classList.remove('flex');
                        // Kembalikan scroll body
                        document.body.style.overflow = 'auto';
                    }, 300);
                }

                // Tutup modal jika menekan tombol Escape di keyboard
                document.addEventListener('keydown', function(event) {
                    if (event.key === "Escape") {
                        closeLightbox();
                    }
                });
            </script>

@endsection
