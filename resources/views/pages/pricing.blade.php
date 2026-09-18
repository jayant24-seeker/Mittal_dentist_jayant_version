@php
    $categoryNotes = [
        'Dental Implants, Crowns & Bridges' => 'Fee includes implant + temporary cap + permanent cap.',
    ];
@endphp
<x-layout
    title="Treatment Charges & Pricing"
    description="Full price list for dental treatments at Mittal Dental Clinic, Jaipur — implants, crowns, root canal, orthodontics, gum treatment and more, in INR and USD.">

    <section class="mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">Charges</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Treatment Pricing</h1>
            <p class="mt-4 text-ink-muted">
                Transparent, upfront pricing for every treatment — quoted in Indian Rupees and US Dollars for
                our international patients. Final cost depends on individual case complexity; book a
                consultation for an exact quote.
            </p>
        </div>

        {{-- Jump links --}}
        <nav data-reveal class="mt-10 flex flex-wrap justify-center gap-2">
            @foreach ($categories as $category => $items)
                <a href="#{{ \Illuminate\Support\Str::slug($category) }}"
                   class="rounded-full border border-brand-100 px-4 py-1.5 text-xs font-semibold text-ink-muted transition hover:border-brand-300 hover:text-brand-500">
                    {{ $category }}
                </a>
            @endforeach
        </nav>

        <div class="mt-12 space-y-12">
            @foreach ($categories as $category => $items)
                <div data-reveal id="{{ \Illuminate\Support\Str::slug($category) }}" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-ink">{{ $category }}</h2>
                    @if (isset($categoryNotes[$category]))
                        <p class="mt-1 text-sm text-ink-faint">{{ $categoryNotes[$category] }}</p>
                    @endif

                    <div class="mt-4 overflow-hidden rounded-2xl border border-brand-100">
                        @foreach ($items as $item)
                            <div class="flex flex-col gap-1 border-b border-brand-100 px-5 py-4 last:border-b-0 sm:flex-row sm:items-center sm:justify-between {{ $loop->even ? 'bg-brand-50/40' : '' }}">
                                <span class="text-sm font-medium text-ink">{{ $item->name }}</span>
                                <span class="text-sm font-semibold text-brand-600">
                                    {{ $item->price_inr }}
                                    @if ($item->price_usd)
                                        <span class="ml-1 font-normal text-ink-faint">({{ $item->price_usd }})</span>
                                    @endif
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div data-reveal class="mt-16 rounded-2xl bg-brand-50 p-8 text-center">
            <h2 class="text-xl font-bold text-ink">Have questions about your treatment cost?</h2>
            <p class="mt-2 text-ink-muted">Book a free consultation and we'll give you a personalized quote.</p>
            <a href="{{ route('contact') }}#appointment-form"
               class="mt-6 inline-flex items-center justify-center rounded-full bg-brand-500 px-8 py-3.5 text-base font-semibold text-white transition hover:bg-brand-600">
                Book Appointment
            </a>
        </div>
    </section>
</x-layout>
