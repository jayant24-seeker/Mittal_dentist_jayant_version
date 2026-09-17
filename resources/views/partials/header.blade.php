@php
    $navLinks = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services.index'],
        ['label' => 'Recognition', 'route' => 'recognition'],
        ['label' => 'Blog', 'route' => 'blog.index'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header x-data="{ open: false }" class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-brand-100">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3 sm:px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
            <span class="text-lg font-bold tracking-tight text-ink">
                MITTAL <span class="text-brand-500">Dental</span>
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-7">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="text-sm font-medium text-ink-muted transition-colors hover:text-brand-500 {{ request()->routeIs($link['route']) ? 'text-brand-500' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden lg:flex items-center gap-3">
            <a href="tel:{{ config('clinic.primary_call_tel') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-ink hover:text-brand-500 transition-colors">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Call Now
            </a>
            <a href="{{ route('contact') }}#appointment-form"
               class="inline-flex items-center rounded-full bg-brand-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-600 hover:shadow-md">
                Book Appointment
            </a>
        </div>

        <button @click="open = !open" class="lg:hidden p-2 text-ink" aria-label="Toggle menu">
            <svg x-show="!open" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="open" x-cloak class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <div x-show="open" x-cloak x-transition class="lg:hidden border-t border-brand-100 bg-white px-4 pb-4">
        <nav class="flex flex-col gap-1 pt-2">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="rounded-lg px-3 py-2.5 text-base font-medium text-ink-muted hover:bg-brand-50 hover:text-brand-500 {{ request()->routeIs($link['route']) ? 'bg-brand-50 text-brand-500' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <a href="{{ route('contact') }}#appointment-form"
           class="mt-3 flex items-center justify-center rounded-full bg-brand-500 px-5 py-3 text-sm font-semibold text-white">
            Book Appointment
        </a>
    </div>
</header>
