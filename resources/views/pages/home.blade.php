<x-layout
    title="Best Dental Clinic in Jaipur"
    description="Mittal Dental Clinic, Nirman Nagar, Jaipur — implants, root canal, orthodontics and general dentistry since 2004. Book your appointment today.">

    {{-- Hero --}}
    <section class="bg-gradient-to-b from-brand-50 to-white">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24 text-center">
            <p data-reveal class="text-sm font-semibold uppercase tracking-wide text-brand-500">Since 2004 · Nirman Nagar, Jaipur</p>
            <h1 data-reveal class="mt-3 text-4xl font-bold tracking-tight text-ink sm:text-5xl">
                Perfect Place for All Your Dental Problems
            </h1>
            <p data-reveal class="mx-auto mt-4 max-w-2xl text-lg text-ink-muted">
                One of the best dental clinics in Jaipur — implants, orthodontics, cosmetic dentistry and
                general dentistry, delivered with precision, care and the latest technology.
            </p>
            <div data-reveal class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('contact') }}#appointment-form"
                   class="inline-flex items-center justify-center rounded-full bg-brand-500 px-8 py-3.5 text-base font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-brand-600 hover:shadow-md">
                    Book Appointment
                </a>
                <a href="tel:{{ config('clinic.primary_call_tel') }}"
                   class="inline-flex items-center justify-center rounded-full border border-ink/15 px-8 py-3.5 text-base font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500">
                    Call {{ config('clinic.phones')[0]['number'] }}
                </a>
            </div>
        </div>
    </section>

    {{-- Trust signals --}}
    <section class="border-y border-brand-100 bg-white">
        <div class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-4 py-10 sm:px-6 lg:grid-cols-4">
            @foreach ([
                ['value' => '20+', 'label' => 'Years of Experience'],
                ['value' => '10,000+', 'label' => 'Patients Treated'],
                ['value' => '98%', 'label' => 'Implant Success Rate'],
                ['value' => '4.8/5', 'label' => 'Patient Rating'],
            ] as $stat)
                <div data-reveal class="text-center">
                    <p class="text-3xl font-bold text-brand-500">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-sm text-ink-muted">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Services overview --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-section-heading eyebrow="What We Offer" tag="h2">Comprehensive Dental Care</x-section-heading>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
        <div data-reveal class="mt-10 text-center">
            <a href="{{ route('services.index') }}" class="text-sm font-semibold text-brand-500 hover:text-brand-600">
                View all services &rarr;
            </a>
        </div>
    </section>

    {{-- Patient transformations --}}
    @if ($transformations->isNotEmpty())
        <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
            <x-section-heading eyebrow="Real Results" tag="h2">Patient Transformations</x-section-heading>
            <p data-reveal class="mx-auto mt-4 max-w-2xl text-center text-ink-muted">
                Drag the slider to see the difference our treatments make — real cases, real recoveries.
            </p>

            <div class="mt-12 grid gap-8 sm:grid-cols-2">
                @foreach ($transformations as $case)
                    <x-before-after-slider
                        :before="$case->before_image"
                        :after="$case->after_image"
                        :title="$case->title" />
                @endforeach
            </div>

            <div class="mx-auto mt-12 max-w-3xl">
                <x-youtube-embed id="Hlsed6Q9dus" title="Mittal Dental Clinic — Clinic Tour" />
            </div>
        </section>
    @endif

    {{-- Recognition teaser --}}
    @if ($recognitions->isNotEmpty())
        <section class="bg-brand-50/60 py-16 sm:py-24">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <x-section-heading eyebrow="Recognition" tag="h2">Trusted &amp; Felicitated</x-section-heading>
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($recognitions as $item)
                        <figure data-reveal class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-lg">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" loading="lazy" class="h-40 w-full object-cover">
                            <figcaption class="p-4 text-sm font-medium text-ink">{{ $item->title }}</figcaption>
                        </figure>
                    @endforeach
                </div>
                <div data-reveal class="mt-10 text-center">
                    <a href="{{ route('recognition') }}" class="text-sm font-semibold text-brand-500 hover:text-brand-600">
                        View full gallery &rarr;
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Latest blog posts --}}
    @if ($posts->isNotEmpty())
        <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
            <x-section-heading eyebrow="From the Blog" tag="h2">Latest News &amp; Dental Advice</x-section-heading>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <a href="{{ route('content.show', $post->slug) }}" data-reveal class="group rounded-2xl border border-brand-100 p-6 transition hover:-translate-y-1 hover:border-brand-300 hover:shadow-lg">
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">{{ $post->published_at->format('d M Y') }}</p>
                        <h3 class="mt-2 text-lg font-semibold text-ink group-hover:text-brand-500">{{ $post->title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-muted">{{ \Illuminate\Support\Str::limit($post->excerpt, 110) }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Final CTA --}}
    <section class="bg-brand-500">
        <div data-reveal class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6">
            <h2 class="text-3xl font-bold text-white sm:text-4xl">Ready to Get Your Smile Back?</h2>
            <p class="mt-3 text-brand-50">Book an appointment today and let our team take care of the rest.</p>
            <a href="{{ route('contact') }}#appointment-form"
               class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-8 py-3.5 text-base font-semibold text-brand-600 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                Book Appointment
            </a>
        </div>
    </section>
</x-layout>
