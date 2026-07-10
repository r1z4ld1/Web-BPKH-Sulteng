@php
    $iconPaths = [
        'mountain'          => 'M3 20l5.5-9 3.5 5 2.5-3.5L20 20H3z M8 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z',
        'eye'               => 'M2.5 12S6 5 12 5s9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z M12 15a3 3 0 100-6 3 3 0 000 6z',
        'shield'            => 'M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z M9 12l2 2 4-4',
        'map'               => 'M9 20l-6-3V4l6 3m0 13l6-3m-6 3V7m6 10l6 3V7l-6-3m0 13V4',
        'clipboard-check'   => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6.5 8 1.8 1.8L14 11',
        'file-check'        => 'M14 3H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V8l-5-5z M14 3v5h5 M9.5 14l1.8 1.8L15 12',
    ];

    $warnaClass = [
        'primary'   => ['bg' => 'bg-primary',   'text' => 'text-white'],
        'secondary' => ['bg' => 'bg-secondary', 'text' => 'text-white'],
        'highlight' => ['bg' => 'bg-highlight', 'text' => 'text-white'],
        'action'    => ['bg' => 'bg-action',    'text' => 'text-contrast'],
    ];
@endphp

<section
    x-data="{
        active: 0,
        total: {{ count($layananUnggulan) }},
        timer: null,
        start() {
            this.timer = setInterval(() => this.next(), 2500)
        },
        stop() {
            clearInterval(this.timer)
        },
        goTo(i) {
            this.active = i
            const track = this.$refs.track
            const card = track.children[i]
            track.scrollTo({ left: card.offsetLeft - track.offsetLeft, behavior: 'smooth' })
        },
        next() { this.goTo((this.active + 1) % this.total) },
        prev() { this.goTo((this.active - 1 + this.total) % this.total) },
        syncActive() {
            const track = this.$refs.track
            let closest = 0
            let minDist = Infinity
            Array.from(track.children).forEach((card, i) => {
                const dist = Math.abs(card.offsetLeft - track.offsetLeft - track.scrollLeft)
                if (dist < minDist) { minDist = dist; closest = i }
            })
            this.active = closest
        }
    }"
    x-init="start()"
    @mouseenter="stop()"
    @mouseleave="start()"
    class="bg-canvas py-14 sm:py-16 lg:py-20"
>
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="font-mono text-xs text-highlight mb-2">6 Jenis Layanan Publik</p>
                <h2 class="font-serif font-medium text-xl sm:text-2xl">Layanan Unggulan BPKH Wilayah XVI</h2>
            </div>

            {{-- Panah navigasi - desktop & tablet --}}
            <div class="hidden sm:flex items-center gap-2">
                <button
                    @click="prev()"
                    type="button"
                    aria-label="Layanan sebelumnya"
                    class="w-10 h-10 rounded-full border border-contrast/15 flex items-center justify-center
                           transition-colors duration-200 hover:bg-primary hover:border-primary hover:text-white"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
                <button
                    @click="next()"
                    type="button"
                    aria-label="Layanan selanjutnya"
                    class="w-10 h-10 rounded-full border border-contrast/15 flex items-center justify-center
                           transition-colors duration-200 hover:bg-primary hover:border-primary hover:text-white"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Track carousel --}}
        <div
            x-ref="track"
            @scroll.debounce.100ms="syncActive()"
            class="flex gap-4 sm:gap-5 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-2 -mx-1 px-1"
        >
            @foreach ($layananUnggulan as $i => $item)
                <div
                    class="snap-start shrink-0 w-[82%] sm:w-[46%] lg:w-[31%]
                           rounded-xl border border-contrast/10 bg-white p-6
                           transition-transform duration-300 ease-smooth"
                >
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl {{ $warnaClass[$item['warna']]['bg'] }} flex items-center justify-center">
                            <svg class="w-6 h-6 {{ $warnaClass[$item['warna']]['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPaths[$item['icon']] }}"/>
                            </svg>
                        </div>
                        <span class="font-mono text-xs text-contrast/30">{{ $item['nomor'] }}</span>
                    </div>

                    <p class="font-medium text-base leading-snug mb-2">{{ $item['judul'] }}</p>
                    <p class="text-sm text-contrast/60 leading-relaxed">{{ $item['deskripsi'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Dot indicator --}}
        <div class="flex items-center justify-center gap-2 mt-6">
            @foreach ($layananUnggulan as $i => $item)
                <button
                    @click="goTo({{ $i }})"
                    type="button"
                    aria-label="Ke layanan nomor {{ $i + 1 }}"
                    class="h-1.5 rounded-full transition-all duration-300 ease-smooth"
                    :class="active === {{ $i }} ? 'w-6 bg-primary' : 'w-1.5 bg-contrast/15'"
                ></button>
            @endforeach
        </div>
    </div>
</section>
