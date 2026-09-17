@props(['service'])
<a href="{{ route('content.show', $service->slug) }}"
   data-reveal
   class="group flex flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-500">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
    </div>
    <h3 class="mt-4 text-lg font-semibold text-ink group-hover:text-brand-500">{{ $service->title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-ink-muted">{{ $service->summary }}</p>
    <span class="mt-4 text-sm font-semibold text-brand-500">Learn more &rarr;</span>
</a>
