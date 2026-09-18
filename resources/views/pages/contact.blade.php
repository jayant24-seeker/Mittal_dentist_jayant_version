<x-layout
    title="Contact Us"
    description="Get in touch with Mittal Dental Clinic, Nirman Nagar, Jaipur. Call, visit, or book an appointment online.">

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">Contact Us</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Reach Us</h1>
        </div>

        <div class="mt-14 grid gap-12 lg:grid-cols-2">
            {{-- Location & phone --}}
            <div data-reveal class="space-y-8">
                <div class="overflow-hidden rounded-2xl border border-brand-100">
                    <iframe
                        title="Mittal Dental Clinic location"
                        class="h-72 w-full"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q={{ urlencode(config('clinic.address.line1') . ', ' . config('clinic.address.line2') . ', ' . config('clinic.address.city')) }}&output=embed">
                    </iframe>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-ink">Mittal Dental Clinic</h2>
                    <p class="mt-2 text-sm leading-relaxed text-ink-muted">
                        {{ config('clinic.address.line1') }}<br>
                        {{ config('clinic.address.line2') }}<br>
                        {{ config('clinic.address.city') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-ink">Call Us</h2>
                    <ul class="mt-2 space-y-1">
                        @foreach (config('clinic.phones') as $phone)
                            <li>
                                <a href="tel:{{ $phone['tel'] }}"
                                   class="inline-flex items-center gap-2 text-sm font-semibold text-brand-500 hover:text-brand-600">
                                    {{ $phone['label'] }}: {{ $phone['number'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-ink">Opening Hours</h2>
                    <ul class="mt-2 space-y-1 text-sm text-ink-muted">
                        @foreach (config('clinic.hours') as $hours)
                            <li>{{ $hours['days'] }}: {{ $hours['time'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Appointment form --}}
            <div id="appointment-form" data-reveal class="scroll-mt-24 rounded-2xl border border-brand-100 bg-white p-6 shadow-sm sm:p-8">
                <h2 class="text-xl font-bold text-ink">Book an Appointment</h2>
                <p class="mt-1 text-sm text-ink-muted">Fill in your details and we'll call you back to confirm.</p>

                @if (session('status'))
                    <div class="mt-4 rounded-lg bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="mt-6 space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-ink">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                        @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-ink">Phone Number</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                               class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                        @error('phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-ink">Email (optional)</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                        @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="service_id" class="block text-sm font-medium text-ink">Service</label>
                        <select name="service_id" id="service_id"
                                class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                            <option value="">Select a service (optional)</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="preferred_date" class="block text-sm font-medium text-ink">Preferred Date</label>
                            <input type="date" name="preferred_date" id="preferred_date" value="{{ old('preferred_date') }}"
                                   class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                            @error('preferred_date') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="preferred_time" class="block text-sm font-medium text-ink">Preferred Time</label>
                            <input type="text" name="preferred_time" id="preferred_time" placeholder="e.g. 5:00 PM" value="{{ old('preferred_time') }}"
                                   class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-ink">Message (optional)</label>
                        <textarea name="message" id="message" rows="3"
                                  class="mt-1 w-full rounded-lg border border-ink/15 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-1 focus:ring-brand-500">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full rounded-full bg-brand-500 px-6 py-3.5 text-base font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-600">
                        Request Appointment
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
