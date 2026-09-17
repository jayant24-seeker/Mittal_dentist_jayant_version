<x-layout
    title="Dental Services in Jaipur"
    description="Explore dental services at Mittal Dental Clinic, Jaipur — implants, root canal, orthodontics, cosmetic dentistry and general dentistry.">

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">Services</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Comprehensive Dental Care</h1>
            <p class="mt-4 text-ink-muted">
                From routine check-ups to advanced implant surgery, every treatment follows international
                standards of hygiene and care.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </section>
</x-layout>
