@props(['eyebrow' => null, 'tag' => 'h2'])
<div data-reveal class="mx-auto max-w-2xl text-center">
    @if ($eyebrow)
        <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">{{ $eyebrow }}</p>
    @endif
    <{{ $tag }} class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">
        {{ $slot }}
    </{{ $tag }}>
</div>
