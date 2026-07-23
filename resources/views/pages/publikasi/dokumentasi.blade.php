@extends('layouts.app')

@section('content')

    <x-page-header
        title="Dokumentasi Kegiatan"
        :breadcrumb="[
            ['label' => 'Publikasi', 'url' => route('publikasi.peraturan')],
            ['label' => 'Dokumentasi Kegiatan', 'url' => route('publikasi.dokumentasi')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 lg:px-12">

            {{-- HEADER REDESIGN: Banner Informatif & Modern --}}
            <div class="relative bg-white rounded-2xl p-6 sm:p-8 lg:p-10 border border-contrast/10 shadow-sm mb-12 overflow-hidden">
                {{-- Ornamen Latar Belakang --}}
                <div class="absolute top-0 right-0 -mt-4 -mr-4 text-contrast/5 pointer-events-none">
                    <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>

                <div class="relative flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                    <div class="flex-1 max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wide uppercase mb-3">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Galeri Digital
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-serif text-contrast mb-3">
                            Jejak Langkah & Aktivitas
                        </h2>
                        <p class="text-sm sm:text-base text-contrast/70 leading-relaxed">
                            Kumpulan dokumentasi kegiatan dan momen penting Balai Pemantapan Kawasan Hutan (BPKH) Wilayah XVI Kota Palu. Arsip ini terintegrasi dan diambil langsung dari publikasi media sosial resmi kami.
                        </p>
                    </div>

                    <div class="shrink-0 z-10">
                        <a href="https://instagram.com/bpkhwilayah16palu" target="_blank" rel="noopener"
                            class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-3.5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/>
                            </svg>
                            @bpkhwilayah16palu
                        </a>
                    </div>
                </div>
            </div>

            @if (count($dokumentasi) > 0)
                {{-- PERUBAHAN: Menjadikan container flex berbaris horizontal (bisa discroll) untuk mobile, lalu kembali menjadi grid di desktop --}}
                <div class="flex overflow-x-auto sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 snap-x snap-mandatory sm:snap-none pb-6 sm:pb-0 sm:overflow-visible hide-scrollbar"
                     x-data="{
                        openModal: false,
                        openPost(url) {
                            this.openModal = true;
                            this.$refs.embedContainer.innerHTML = `
                                <blockquote class='instagram-media'
                                            data-instgrm-captioned
                                            data-instgrm-permalink='${url}?utm_source=ig_embed&utm_campaign=loading'
                                            data-instgrm-version='14'
                                            style='background:#FFF; border:0; border-radius:12px; box-shadow:none; margin:0; max-width: none; width:100%; min-width: 280px;'>
                                    <div style='padding:24px; text-align:center;'>
                                        Memuat detail postingan Instagram…
                                    </div>
                                </blockquote>
                            `;
                            this.$nextTick(() => {
                                if (window.instgrm && window.instgrm.Embeds) {
                                    window.instgrm.Embeds.process();
                                }
                            });
                        },
                        closeModal() {
                            this.openModal = false;
                            setTimeout(() => {
                                this.$refs.embedContainer.innerHTML = '';
                            }, 300);
                        }
                     }">

                    @foreach ($dokumentasi as $item)
                        {{-- PERUBAHAN: Menambahkan class shrink-0, w-[80%], snap-center untuk versi mobile --}}
                        <div class="dokumentasi-card shrink-0 w-[80%] sm:w-auto snap-center sm:snap-align-none break-inside-avoid rounded-2xl bg-white shadow-sm overflow-hidden group cursor-pointer border border-contrast/5"
                             @click="openPost('{{ $item['url'] }}')">

                            <div class="relative overflow-hidden aspect-[4/5] sm:aspect-[4/3] lg:aspect-[4/5] bg-contrast/5">
                                @if (isset($item['image']))
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] ?? 'Dokumentasi' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center p-6 text-contrast/30">
                                        <svg class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-xs text-center font-medium">Gambar tidak tersedia</p>
                                    </div>
                                @endif

                                <div class="absolute inset-0 bg-black/0 group-hover:bg-slate-900/70 backdrop-blur-[0px] group-hover:backdrop-blur-[2px] transition-all duration-300"></div>

                                <div class="absolute inset-0 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-4 group-hover:translate-y-0">
                                    <div class="w-14 h-14 rounded-full bg-[#d6a13d] flex items-center justify-center text-white shadow-lg mb-4 transform scale-75 group-hover:scale-100 transition-transform duration-300 delay-100">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                    <h3 class="text-white text-center font-semibold text-sm sm:text-base leading-snug line-clamp-3 px-2">
                                        {{ $item['title'] ?? 'Lihat Detail Dokumentasi Kegiatan Ini' }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Modal Global Dokumentasi (TIDAK DIUBAH) --}}
                    <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 overflow-hidden"
                         x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                         style="display: none;">

                        <div class="relative bg-white rounded-xl shadow-2xl max-w-6xl w-full max-h-[90vh] overflow-hidden transition-all duration-300"
                             @click.outside="closeModal()"
                             x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="scale-95" x-transition:enter-end="scale-100">

                            <div class="flex items-center justify-between p-4 border-b border-contrast/10">
                                <h4 class="text-base font-semibold text-contrast">Detail Dokumentasi</h4>
                                <button @click="closeModal()" class="w-8 h-8 rounded-full flex items-center justify-center text-contrast/50 hover:bg-contrast/5 hover:text-contrast transition">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <div class="modal-content overflow-y-auto" style="height: calc(90vh - 65px);">
                                <div class="instagram-embed-container p-4 sm:p-6 lg:p-8 flex justify-center" x-ref="embedContainer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="rounded-2xl border border-dashed border-contrast/20 bg-white p-12 text-center flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 text-contrast/20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="text-lg font-medium text-contrast mb-1">Belum Ada Dokumentasi</h3>
                    <p class="text-sm text-contrast/50 max-w-sm">Dokumentasi kegiatan belum ditambahkan. Silakan periksa kembali nanti.</p>
                </div>
            @endif

        </div>
    </section>

    @push('scripts')
        <script async src="https://www.instagram.com/embed.js"></script>
    @endpush

    @push('styles')
        <style>
            .instagram-embed-container .instagram-media {
                width: 100% !important;
                max-width: none !important;
                min-width: 280px !important;
            }

            .instagram-embed-container iframe {
                min-width: 0 !important;
                width: 100% !important;
                max-width: none !important;
            }

            /* Utilitas tambahan untuk menyembunyikan scrollbar di tampilan mobile */
            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }
            .hide-scrollbar {
                -ms-overflow-style: none; /* IE and Edge */
                scrollbar-width: none; /* Firefox */
            }
        </style>
    @endpush

@endsection
