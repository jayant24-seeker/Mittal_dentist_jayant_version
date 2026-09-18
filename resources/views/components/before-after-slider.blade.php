@props(['before', 'after', 'title' => null])
<div
    data-reveal
    x-data="{
        pos: 50,
        dragging: false,
        setFromClientX(clientX) {
            const rect = this.$refs.frame.getBoundingClientRect();
            const pct = ((clientX - rect.left) / rect.width) * 100;
            this.pos = Math.min(100, Math.max(0, pct));
        },
    }"
    @mousemove.window="dragging && setFromClientX($event.clientX)"
    @touchmove.window="dragging && setFromClientX($event.touches[0].clientX)"
    @mouseup.window="dragging = false"
    @touchend.window="dragging = false"
    class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-sm"
>
    <div
        x-ref="frame"
        class="relative aspect-[4/3] w-full select-none overflow-hidden"
        @mousedown="dragging = true; setFromClientX($event.clientX)"
        @touchstart="dragging = true; setFromClientX($event.touches[0].clientX)"
    >
        <img src="{{ $after }}" alt="After treatment{{ $title ? ' — ' . $title : '' }}" loading="lazy"
             class="pointer-events-none absolute inset-0 h-full w-full object-cover">

        <img src="{{ $before }}" alt="Before treatment{{ $title ? ' — ' . $title : '' }}" loading="lazy"
             class="pointer-events-none absolute inset-0 h-full w-full object-cover"
             :style="`clip-path: inset(0 ${100 - pos}% 0 0)`">

        <div class="pointer-events-none absolute inset-y-0 w-0.5 bg-white/90 shadow" :style="`left: ${pos}%`"></div>

        <div class="pointer-events-none absolute top-1/2 flex h-9 w-9 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white text-brand-500 shadow-md"
             :style="`left: ${pos}%`">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l-5 5 5 5M16 7l5 5-5 5"/>
            </svg>
        </div>

        <span class="pointer-events-none absolute left-3 top-3 rounded-full bg-black/50 px-2.5 py-1 text-xs font-semibold text-white">Before</span>
        <span class="pointer-events-none absolute right-3 top-3 rounded-full bg-black/50 px-2.5 py-1 text-xs font-semibold text-white">After</span>
    </div>

    @if ($title)
        <p class="px-4 py-3 text-sm font-medium text-ink">{{ $title }}</p>
    @endif
</div>
