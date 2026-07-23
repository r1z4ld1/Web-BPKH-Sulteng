@extends('layouts.app')

@section('content')

    <x-page-header
        title="Sistem Pelayanan Terpadu (SIPADU)"
        :breadcrumb="[
            ['label' => 'Layanan', 'url' => route('layanan.alur')],
            ['label' => 'Sistem Pelayanan Terpadu', 'url' => route('layanan.pelayanan-terpadu')],
        ]"
    />

    <section class="bg-canvas py-14 sm:py-16 lg:py-20" x-data="{ loaded: false }">
        <div class="mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">

            {{-- Bagian Header Konten --}}
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-serif text-contrast mb-4 tracking-tight">
                    Sistem Pelayanan Terpadu (SIPADU)
                </h2>
                <p class="text-sm sm:text-base text-contrast/70 leading-relaxed max-w-3xl">
                    Ajukan permohonan layanan Balai Pemantapan Kawasan Hutan Wilayah XVI Palu melalui
                    formulir SIPADU-16 di bawah ini. Pastikan seluruh data yang diisi lengkap dan sesuai
                    sebelum mengirimkan permohonan.
                </p>
            </div>

            {{-- Panel Info & Aksi --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 p-5 mb-6 rounded-2xl bg-white border border-contrast/10 shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1.5 text-xs font-bold text-primary uppercase tracking-wider">
                        Formulir Digital
                    </span>
                    <span class="text-sm font-semibold text-contrast/80">SIPADU-16</span>
                </div>

                <a href="{{ $googleFormUrlOriginal }}" target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:opacity-90 hover:shadow-md hover:-translate-y-0.5 w-full md:w-auto">
                    Buka di Tab Baru
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>

            {{-- Pesan Peringatan Sistem Google Form --}}
            <div class="flex items-start gap-3 p-4 mb-8 rounded-xl bg-yellow-50 border border-yellow-200">
                <svg class="w-5 h-5 text-yellow-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-yellow-800 leading-relaxed">
                    <strong class="font-semibold text-yellow-900">Catatan Keamanan:</strong> Karena formulir ini mewajibkan unggah dokumen, sistem Google mungkin akan menampilkan halaman yang meminta Anda untuk klik tombol <strong>"Isi formulir"</strong> atau melakukan login ke akun Google. Jika formulir gagal dimuat, silakan gunakan tombol di atas.
                </p>
            </div>

            {{-- Card Pembungkus Iframe Form --}}
            <div class="rounded-3xl border border-contrast/10 bg-white p-2 sm:p-4 relative overflow-hidden shadow-sm">

                {{-- Skeleton loading, hilang otomatis setelah iframe termuat --}}
                <div
                    x-show="!loaded"
                    class="absolute inset-2 sm:inset-4 rounded-2xl bg-secondary/5 flex flex-col items-center justify-center gap-4 z-10"
                >
                    <svg class="w-10 h-10 text-primary animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                    <p class="text-sm font-medium text-contrast/60 animate-pulse">Menghubungkan ke Google Forms…</p>
                </div>

                {{-- Iframe Google Form --}}
                <iframe
                    src="{{ $googleFormUrl }}"
                    class="w-full rounded-2xl"
                    style="height: 330px;"
                    frameborder="0"
                    marginheight="0"
                    marginwidth="0"
                    @load="loaded = true"
                >
                    Memuat…
                </iframe>
            </div>

        </div>
    </section>

@endsection
