<x-layout
    title="About Us"
    description="Meet the dentists behind Mittal Dental Clinic, Jaipur — Dr. Sankalp Mittal and Dr. Preeti Mittal.">

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">About Us</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Meet Our Dentists</h1>
            <p class="mt-4 text-ink-muted">
                Established in 2004, Mittal Dental Clinic Implant &amp; Laser Centre in Nirman Nagar is one of
                Jaipur's most trusted dental practices — combining decades of clinical experience with
                state-of-the-art technology.
            </p>
        </div>

        <div class="mt-16 space-y-16">
            @foreach ($team as $member)
                <div data-reveal class="grid gap-8 sm:grid-cols-3 sm:items-start">
                    <div class="sm:col-span-1">
                        @if ($member->photo)
                            <img src="{{ $member->photo }}" alt="{{ $member->name }}" loading="lazy"
                                 class="aspect-square w-full rounded-2xl object-cover">
                        @else
                            <div class="flex aspect-square w-full items-center justify-center rounded-2xl bg-brand-50 text-4xl font-bold text-brand-300">
                                {{ collect(explode(' ', $member->name))->map(fn ($n) => $n[0])->join('') }}
                            </div>
                        @endif
                    </div>
                    <div class="sm:col-span-2">
                        <h2 class="text-2xl font-bold text-ink">{{ $member->name }}</h2>
                        <p class="mt-1 font-medium text-brand-500">{{ $member->title }}</p>
                        @if ($member->credentials)
                            <p class="mt-1 text-sm text-ink-faint">{{ $member->credentials }}</p>
                        @endif
                        <div class="prose prose-sm mt-4 max-w-none text-ink-muted">
                            {!! $member->bio !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
