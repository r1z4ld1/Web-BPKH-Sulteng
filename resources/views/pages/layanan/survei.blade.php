@extends('layouts.app')

@section('content')

    <x-page-header
        title="Survei Kepuasan Masyarakat"
        :breadcrumb="[
            ['label' => 'Layanan', 'url' => route('layanan.alur')],
            ['label' => 'Survei Kepuasan Masyarakat', 'url' => route('layanan.survei')],
        ]"
    />

    {{-- Responsif di 3 Kategori Perangkat lewat penyesuaian py dan px --}}
    <section class="bg-canvas py-14 sm:py-16 lg:py-20" x-data="{ loaded: false } font-sans">
        <div class="mx-auto max-w-4xl px-6 sm:px-8 lg:px-12">

            {{-- Bagian Header Konten --}}
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-serif text-contrast mb-4 tracking-tight">
                    Survei Pelayanan Kepuasan Masyarakat
                </h2>
                <p class="text-sm sm:text-base text-contrast/70 leading-relaxed max-w-3xl">
                    Masukan Anda membantu kami meningkatkan kualitas pelayanan. Silakan isi Survei
                    Kepuasan Masyarakat berdasarkan pengalaman Anda menggunakan layanan Balai
                    Pemantapan Kawasan Hutan Wilayah XVI Palu.
                </p>
            </div>

            {{-- Panel Info & Aksi (Responsif: Kolom di Mobile, Baris di Tablet/Desktop) --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 p-5 mb-6 rounded-2xl bg-white border border-contrast/10 shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary/10 px-3.5 py-1.5 text-xs font-bold text-secondary uppercase tracking-wider">
                        Evaluasi Layanan
                    </span>
                    <span class="text-sm font-semibold text-contrast/80">Kuesioner Digital</span>
                </div>

                <a href="{{ $googleFormUrlOriginal }}" target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:opacity-90 hover:shadow-md hover:-translate-y-0.5 w-full md:w-auto">
                    Buka di Tab Baru
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>

            {{-- Kotak Peringatan/Edukasi Sistem Google Form --}}
            <div class="flex items-start gap-3 p-4 mb-8 rounded-xl bg-yellow-50 border border-yellow-200">
                <svg class="w-5 h-5 text-yellow-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm text-yellow-800 leading-relaxed">
                    <strong class="font-semibold text-yellow-900">Tips Pengisian:</strong> Jika formulir di bawah ini mengalami kendala pemuatan atau tampilan terpotong pada perangkat seluler Anda, silakan klik tombol <strong>"Buka di Tab Baru"</strong> di atas untuk kenyamanan pengisian.
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
                    <p class="text-sm font-medium text-contrast/60 animate-pulse">Menghubungkan ke server survei…</p>
                </div>

                {{-- Iframe Google Form dengan Tinggi Optimal --}}
                <iframe
                    src="{{ $googleFormUrl }}"
                    class="w-full rounded-2xl"
                    style="height: 1400px;"
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
