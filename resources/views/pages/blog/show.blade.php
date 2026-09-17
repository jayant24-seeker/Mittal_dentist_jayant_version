<x-layout
    :title="$post->meta_title ?? $post->title"
    :description="$post->meta_description ?? $post->excerpt">

    <article class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24">
        <nav data-reveal class="text-sm text-ink-faint">
            <a href="{{ route('blog.index') }}" class="hover:text-brand-500">Blog</a>
            <span class="mx-1">/</span>
            <span class="text-ink-muted">{{ $post->title }}</span>
        </nav>

        <h1 data-reveal class="mt-4 text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ $post->title }}</h1>
        <p data-reveal class="mt-3 text-sm text-ink-faint">{{ $post->published_at->format('d M Y') }}</p>

        @if ($post->cover_image)
            <img data-reveal src="{{ $post->cover_image }}" alt="{{ $post->title }}" loading="lazy"
                 class="mt-8 aspect-video w-full rounded-2xl object-cover">
        @endif

        <div data-reveal class="prose prose-neutral mt-8 max-w-none">
            {!! $post->body !!}
        </div>
    </article>
</x-layout>
