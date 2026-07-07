@props(['label', 'items'])

<div x-data="{ open: false }" @click.outside="open = false" class="relative">
    <button
        @click="open = !open"
        type="button"
        class="nav-link text-base flex items-center gap-1"
        :class="open ? 'text-primary' : ''"
    >
        {{ $label }}
        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-smooth duration-150"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-smooth duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute left-0 top-full mt-2 w-64 rounded-xl bg-white border border-contrast/10 shadow-lg py-2 z-50"
    >
        @foreach ($items as $item)
            <a href="{{ $item['url'] ?? '#' }}"
               class="block px-4 py-2.5 text-sm text-contrast/80 transition-colors duration-150 hover:bg-secondary/10 hover:text-primary">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>
