<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Beranda' }} — BPKH Kota Palu</title>
    <meta name="description" content="Situs resmi Balai Pemantapan Kawasan Hutan (BPKH) Kota Palu — penataan batas, pengukuran, dan pemetaan kawasan hutan di Sulawesi Tengah.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-sans antialiased bg-base text-contrast">

    @include('layouts.partials.navbar')

    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')

    @stack('scripts')
</body>
</html>
