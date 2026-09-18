<footer class="bg-charcoal text-white/80">
    <div class="mx-auto max-w-6xl px-4 py-14 sm:px-6">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <span class="text-lg font-bold text-white">MITTAL <span class="text-brand-400">Dental</span></span>
                <p class="mt-3 text-sm leading-relaxed">
                    {{ config('clinic.address.line1') }}<br>
                    {{ config('clinic.address.line2') }}<br>
                    {{ config('clinic.address.city') }}
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-white">Quick Links</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-brand-400">Home</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-brand-400">Services</a></li>
                    <li><a href="{{ route('pricing') }}" class="hover:text-brand-400">Pricing</a></li>
                    <li><a href="{{ route('recognition') }}" class="hover:text-brand-400">Recognition</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-brand-400">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand-400">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-white">Reach Us</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    @foreach (config('clinic.phones') as $phone)
                        <li><a href="tel:{{ $phone['tel'] }}" class="hover:text-brand-400">{{ $phone['number'] }}</a></li>
                    @endforeach
                    <li><a href="mailto:{{ config('clinic.email') }}" class="hover:text-brand-400">{{ config('clinic.email') }}</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-white">Opening Hours</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    @foreach (config('clinic.hours') as $hours)
                        <li>{{ $hours['days'] }}: {{ $hours['time'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-10 border-t border-white/10 pt-6 text-xs text-white/50">
            &copy; {{ now()->year }} {{ config('clinic.name') }}. All Rights Reserved.
        </div>
    </div>
</footer>
