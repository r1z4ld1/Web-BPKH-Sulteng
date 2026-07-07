@props(['label', 'items'])

<div x-data="{ open: false }" class="border-b border-white/10 last:border-0">
    <button
        @click="open = !open"
        type="button"
        class="w-full flex items-center justify-between py-3 px-3 text-base font-medium"
    >
        {{ $label }}
        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/>
        </svg>
    </button>

    <div x-show="open" x-cloak x-collapse class="pb-2">
        @foreach ($items as $item)
            <a href="{{ $item['url'] ?? '#' }}"
               class="block py-2 pl-6 pr-3 text-sm text-secondary hover:text-action transition-colors duration-150">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>
