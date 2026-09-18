<x-layout
    title="Dental Health Blog"
    description="Dental care tips, treatment guides and clinic news from Mittal Dental Clinic, Jaipur.">

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <div data-reveal class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-500">Blog</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">Dental Health &amp; Clinic News</h1>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <a href="{{ route('content.show', $post->slug) }}" data-reveal
                   class="group flex flex-col rounded-2xl border border-brand-100 p-6 transition hover:-translate-y-1 hover:border-brand-300 hover:shadow-lg">
                    @if ($post->category)
                        <span class="text-xs font-semibold uppercase tracking-wide text-brand-500">{{ $post->category }}</span>
                    @endif
                    <h2 class="mt-2 text-lg font-semibold text-ink group-hover:text-brand-500">{{ $post->title }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-ink-muted">{{ \Illuminate\Support\Str::limit($post->excerpt, 110) }}</p>
                    <span class="mt-4 text-xs text-ink-faint">{{ $post->published_at->format('d M Y') }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </section>
</x-layout>
