{{--@props(['title', 'breadcrumb' => []])

<div class="bg-contrast">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12 py-10 sm:py-12">
        <nav class="flex items-center gap-2 text-xs text-secondary mb-4" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-action transition-colors">Beranda</a>
            @foreach ($breadcrumb as $crumb)
                <svg class="w-3 h-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6"/>
                </svg>
                @if (!$loop->last)
                    <a href="{{ $crumb['url'] }}" class="hover:text-action transition-colors">{{ $crumb['label'] }}</a>
                @else
                    <span class="text-white">{{ $crumb['label'] }}</span>
                @endif
            @endforeach
        </nav>
        <h1 class="font-serif font-medium text-2xl sm:text-3xl lg:text-4xl text-white">{{ $title }}</h1>
    </div>
</div>--}}
