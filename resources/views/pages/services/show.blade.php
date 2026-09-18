@php
    $siblings = \App\Models\Service::where('id', '!=', $service->id)->orderBy('sort_order')->limit(4)->get();
@endphp
<x-layout
    :title="$service->meta_title ?? $service->title"
    :description="$service->meta_description ?? $service->summary">

    <section class="mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:py-24">
        <nav data-reveal class="text-sm text-ink-faint">
            <a href="{{ route('services.index') }}" class="hover:text-brand-500">Services</a>
            <span class="mx-1">/</span>
            <span class="text-ink-muted">{{ $service->title }}</span>
        </nav>

        <h1 data-reveal class="mt-4 text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ $service->title }}</h1>

        @if ($service->image)
            <img data-reveal src="{{ $service->image }}" alt="{{ $service->title }}" loading="lazy"
                 class="mt-8 aspect-video w-full rounded-2xl object-cover">
        @endif

        <div data-reveal class="mt-6 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-brand-100 bg-brand-50/60 px-5 py-4">
            @if ($service->price_from)
                <p class="text-sm font-medium text-ink">
                    Starting from <span class="text-base font-bold text-brand-600">{{ $service->price_from }}</span>
                </p>
                <a href="{{ route('pricing') }}{{ $service->pricing_anchor ? '#' . $service->pricing_anchor : '' }}"
                   class="text-sm font-semibold text-brand-500 hover:text-brand-600">
                    See full price list &rarr;
                </a>
            @else
                <p class="text-sm font-medium text-ink">Pricing depends on your specific case.</p>
                <a href="{{ route('pricing') }}" class="text-sm font-semibold text-brand-500 hover:text-brand-600">
                    View treatment charges &rarr;
                </a>
            @endif
        </div>

        <div data-reveal class="prose prose-neutral mt-8 max-w-none">
            {!! $service->body !!}
        </div>

        <div data-reveal class="mt-12 rounded-2xl bg-brand-50 p-8 text-center">
            <h2 class="text-xl font-bold text-ink">Interested in {{ $service->title }}?</h2>
            <p class="mt-2 text-ink-muted">Book a consultation and our team will guide you through the next steps.</p>
            <a href="{{ route('contact') }}#appointment-form"
               class="mt-6 inline-flex items-center justify-center rounded-full bg-brand-500 px-8 py-3.5 text-base font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-600">
                Book Appointment
            </a>
        </div>

        @if ($siblings->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-lg font-semibold text-ink">Other Services</h2>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ($siblings as $sibling)
                        <a href="{{ route('content.show', $sibling->slug) }}" data-reveal
                           class="rounded-xl border border-brand-100 p-4 text-sm font-medium text-ink transition hover:border-brand-300 hover:text-brand-500">
                            {{ $sibling->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layout>
