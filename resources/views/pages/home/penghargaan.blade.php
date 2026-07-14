<!-- ============================================== -->
<!-- SECTION PENGHARGAAN (SERTIFIKAT)               -->
<!-- ============================================== -->
<!-- 1. Tambahkan CSS Swiper di bagian atas/head -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="py-16 lg:py-24 bg-gradient-to-b from-white to-[#F5F3EC]/50 overflow-hidden relative">

    @php
        // DUMMY DATA: Silakan sesuaikan array ini dengan path gambar asli Anda.
        // Berisi 11 Landscape dan 2 Portrait sesuai informasi Anda.
        $sertifikat = [
            ['id' => 0, 'judul' => 'Peningkatan Tata Kelola Berkesinambungan', 'img' => asset('images/sertifikat/sertifikat-01.jpg'), 'orientasi' => 'landscape'],
            ['id' => 1, 'judul' => 'Piagam Pencanangan Pembangunan Zona Integritas', 'img' => asset('images/sertifikat/sertifikat-02.jpg'), 'orientasi' => 'landscape'],
            ['id' => 2, 'judul' => 'Pengelolaan Dan Wasdal Barang Milik Negara', 'img' => asset('images/sertifikat/sertifikat-03.jpg'), 'orientasi' => 'landscape'],
            ['id' => 3, 'judul' => 'Sertifikat ISO 9001:2015', 'img' => asset('images/sertifikat/sertifikat-potrait-01.jpg'), 'orientasi' => 'portrait'], // Portrait 1
            ['id' => 4, 'judul' => 'Piagam Penghargaan Lomba Kebersihan & Keindahan Antar SKPD', 'img' => asset('images/sertifikat/sertifikat-04.jpg'), 'orientasi' => 'landscape'],
            ['id' => 5, 'judul' => 'Piagam Penghargaan Lomba Kebersihan & Keindahan Antar SKPD', 'img' => asset('images/sertifikat/sertifikat-05.jpg'), 'orientasi' => 'landscape'],
            ['id' => 6, 'judul' => 'Capaian Kinerja Pelaksana Kegiatan & Anggran (DIPA)', 'img' => asset('images/sertifikat/sertifikat-06.jpg'), 'orientasi' => 'landscape'],
            ['id' => 7, 'judul' => 'Sertifikat ISO 9001:2015', 'img' => asset('images/sertifikat/sertifikat-potrait-02.jpg'), 'orientasi' => 'portrait'], // Portrait 2
            ['id' => 8, 'judul' => 'Sertifikat Capaian Realisasi Keuangan (DIPA)', 'img' => asset('images/sertifikat/sertifikat-07.jpg'), 'orientasi' => 'landscape'],
            ['id' => 9, 'judul' => 'Sertifikat Maklumat Pelayanan', 'img' => asset('images/sertifikat/sertifikat-08.jpg'), 'orientasi' => 'landscape'],
            ['id' => 10, 'judul' => 'Piagam Penghargaan Satuan Kerja Unit Pelaksana Teknis Terbaik', 'img' => asset('images/sertifikat/sertifikat-09.jpg'), 'orientasi' => 'landscape'],
        ];
    @endphp

    <div class="container mx-auto px-4 max-w-7xl">
        {{-- Header Section --}}
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-[#16241C] mb-4">Penghargaan & Sertifikasi</h2>
            <div class="w-16 h-1.5 bg-[#C89B3C] mx-auto mb-6 rounded-full"></div>
            <p class="text-[#16241C]/60 max-w-2xl mx-auto text-sm md:text-base">
                Bukti komitmen dan dedikasi kami dalam memberikan pelayanan terbaik, yang tercermin melalui berbagai penghargaan dan sertifikasi resmi.
            </p>
        </div>

        {{-- Slider Container --}}
        <div class="relative px-4 sm:px-10">
            <div class="swiper certSwiper pb-12">
                <div class="swiper-wrapper">

                    @foreach ($sertifikat as $item)
                        <div class="swiper-slide">
                            <!-- Card Sertifikat -->
                            <div class="group relative bg-white rounded-xl shadow-sm border border-[#2F5D45]/10 p-3 h-[250px] md:h-[280px] lg:h-[300px] flex items-center justify-center cursor-pointer transition-all duration-300 hover:shadow-xl hover:border-[#C89B3C]/50 hover:-translate-y-1"
                                 onclick="openCertModal({{ $item['id'] }})">

                                {{-- Placeholder background untuk mempermanis --}}
                                <div class="absolute inset-0 bg-[#F5F3EC]/30 rounded-xl"></div>

                                {{-- Gambar Sertifikat (object-contain memastikan tidak ada yang terpotong) --}}
                                <img src="{{ $item['img'] }}" alt="{{ $item['judul'] }}"
                                     class="relative z-10 max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-[1.03]"
                                     onerror="this.src='{{ asset('images/placeholder-document.png') }}'">

                                {{-- Overlay Hover --}}
                                <div class="absolute inset-0 bg-[#16241C]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl z-20 flex flex-col items-center justify-center backdrop-blur-sm">
                                    <div class="bg-[#C89B3C] p-3 rounded-full text-white mb-3 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                                    </div>
                                    <span class="text-white text-sm font-medium text-center px-4 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-75">
                                        {{ $item['judul'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Pagination Dots --}}
                <div class="swiper-pagination !bottom-0"></div>
            </div>

            {{-- Custom Navigation Arrows (Muncul di luar card pada desktop) --}}
            <div class="swiper-button-prev !text-[#C89B3C] !left-0 sm:!-left-4 lg:!-left-6 bg-white shadow-lg w-10 h-10 md:w-12 md:h-12 rounded-full border border-gray-100 after:!text-sm md:after:!text-lg hover:scale-110 transition-transform"></div>
            <div class="swiper-button-next !text-[#C89B3C] !right-0 sm:!-right-4 lg:!-right-6 bg-white shadow-lg w-10 h-10 md:w-12 md:h-12 rounded-full border border-gray-100 after:!text-sm md:after:!text-lg hover:scale-110 transition-transform"></div>
        </div>
    </div>
</section>

<!-- ============================================== -->
<!-- MODAL LIGHTBOX SERTIFIKAT                      -->
<!-- ============================================== -->
<div id="certLightbox" class="fixed inset-0 z-[100] hidden items-center justify-center" aria-modal="true">
    {{-- Background Overlay --}}
    <div class="fixed inset-0 bg-[#16241C]/95 backdrop-blur-md transition-opacity opacity-0" id="certLightboxBg" onclick="closeCertModal()"></div>

    {{-- Tombol Close --}}
    <button onclick="closeCertModal()" class="absolute top-4 right-4 md:top-6 md:right-6 text-white/70 hover:text-white z-50 p-2 bg-black/20 rounded-full hover:bg-black/40 transition-all">
        <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

    {{-- Container Konten --}}
    <div class="relative w-full h-full flex items-center justify-center p-4 md:p-12 z-40" id="certLightboxContent">

        {{-- Tombol Navigasi Kiri --}}
        <button onclick="prevCert()" class="absolute left-2 md:left-10 text-white/50 hover:text-white hover:scale-110 p-2 md:p-4 transition-all z-50">
            <svg class="w-8 h-8 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        {{-- Gambar Center --}}
        <div class="relative flex flex-col items-center transform scale-95 opacity-0 transition-all duration-300 w-full max-w-5xl h-full justify-center" id="certModalInner">
            <img id="certModalImg" src="" alt="Sertifikat" class="w-auto h-auto max-w-full max-h-[75vh] md:max-h-[85vh] object-contain rounded-md shadow-2xl">

            {{-- Judul Bawah --}}
            <div class="mt-4 text-center">
                <h4 id="certModalTitle" class="text-white font-medium text-lg md:text-xl tracking-wide drop-shadow-md"></h4>
                <div class="text-[#C89B3C] text-sm mt-1">Gunakan panah untuk menggeser</div>
            </div>
        </div>

        {{-- Tombol Navigasi Kanan --}}
        <button onclick="nextCert()" class="absolute right-2 md:right-10 text-white/50 hover:text-white hover:scale-110 p-2 md:p-4 transition-all z-50">
            <svg class="w-8 h-8 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

    </div>
</div>

<!-- ============================================== -->
<!-- SCRIPTS                                        -->
<!-- ============================================== -->
<!-- 2. Tambahkan JS Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Inisialisasi Swiper Slider
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.certSwiper', {
            // Pengaturan Auto-slide
            autoplay: {
                delay: 3500, // Geser otomatis setiap 3.5 detik
                disableOnInteraction: false, // Tetap auto-slide walau setelah digeser manual
            },
            loop: true, // Mengulang dari awal jika sudah di akhir
            grabCursor: true,
            spaceBetween: 20,

            // Responsif di 3 Kategori Perangkat
            breakpoints: {
                // Mobile (< 640px)
                320: {
                    slidesPerView: 1.2, // Tampilkan 1 penuh, dan sedikit intipan slide sebelahnya
                    spaceBetween: 16,
                },
                // Tablet (640px - 1024px)
                640: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                // Desktop (> 1024px)
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                }
            },

            // Tombol Navigasi
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Titik Pagination Bawah
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    // ==========================================
    // LOGIKA MODAL LIGHTBOX KUSTOM
    // ==========================================

    // Convert array PHP ke Object JS untuk Lightbox
    const certData = @json($sertifikat);
    let currentCertIndex = 0;

    function openCertModal(id) {
        currentCertIndex = certData.findIndex(item => item.id === id);
        updateModalContent();

        const lightbox = document.getElementById('certLightbox');
        const bg = document.getElementById('certLightboxBg');
        const inner = document.getElementById('certModalInner');

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');

        // Animasi Masuk
        setTimeout(() => {
            bg.classList.remove('opacity-0');
            inner.classList.remove('scale-95', 'opacity-0');
            inner.classList.add('scale-100', 'opacity-100');
        }, 10);

        document.body.style.overflow = 'hidden';
    }

    function closeCertModal() {
        const lightbox = document.getElementById('certLightbox');
        const bg = document.getElementById('certLightboxBg');
        const inner = document.getElementById('certModalInner');

        // Animasi Keluar
        bg.classList.add('opacity-0');
        inner.classList.remove('scale-100', 'opacity-100');
        inner.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    function updateModalContent() {
        const data = certData[currentCertIndex];
        const imgEl = document.getElementById('certModalImg');
        const titleEl = document.getElementById('certModalTitle');

        // Efek transisi halus saat berganti gambar
        imgEl.style.opacity = 0;
        setTimeout(() => {
            imgEl.src = data.img;
            titleEl.innerText = data.judul;
            imgEl.style.opacity = 1;
        }, 150);
    }

    function prevCert() {
        if (currentCertIndex > 0) {
            currentCertIndex--;
        } else {
            currentCertIndex = certData.length - 1; // Looping ke gambar terakhir
        }
        updateModalContent();
    }

    function nextCert() {
        if (currentCertIndex < certData.length - 1) {
            currentCertIndex++;
        } else {
            currentCertIndex = 0; // Looping ke gambar pertama
        }
        updateModalContent();
    }

    // Dukungan Keyboard (Esc untuk tutup, Panah Kiri/Kanan untuk geser)
    document.addEventListener('keydown', function(event) {
        const lightbox = document.getElementById('certLightbox');
        if (!lightbox.classList.contains('hidden')) {
            if (event.key === "Escape") closeCertModal();
            if (event.key === "ArrowLeft") prevCert();
            if (event.key === "ArrowRight") nextCert();
        }
    });
</script>
