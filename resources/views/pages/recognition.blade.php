<x-layout
    title="Recognition &amp; Media"
    description="Achievements, felicitations and press mentions for Dr. Sankalp Mittal and Mittal Dental Clinic, Jaipur.">

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">Recognition &amp; Media</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Trusted, Honoured &amp; Felicitated</h1>
            <p class="mt-4 text-ink-muted">
                Moments with dignitaries and healthcare leaders, and press coverage recognising our
                commitment to dental excellence.
            </p>
        </div>

        @if ($achievements->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-xl font-semibold text-ink">Achievements &amp; Felicitations</h2>
                <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($achievements as $item)
                        <figure data-reveal class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-sm">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" loading="lazy" class="h-48 w-full object-cover">
                            <figcaption class="p-4">
                                <p class="text-sm font-semibold text-ink">{{ $item->title }}</p>
                                @if ($item->description)
                                    <p class="mt-1 text-xs text-ink-muted">{{ $item->description }}</p>
                                @endif
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($press->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-xl font-semibold text-ink">Press Mentions</h2>
                <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($press as $item)
                        <figure data-reveal class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-sm">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" loading="lazy" class="h-48 w-full object-cover">
                            <figcaption class="p-4">
                                <p class="text-sm font-semibold text-ink">{{ $item->title }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layout>
