@props(['id', 'title'])
{{--
    This channel has embedding disabled for its videos (YouTube error 153,
    confirmed directly against the embed URL), so an <iframe> just shows an
    error. Linking out to a thumbnail card is the reliable alternative.
--}}
<a href="https://youtu.be/{{ $id }}" target="_blank" rel="noopener noreferrer"
   data-reveal
   class="group relative block aspect-video w-full overflow-hidden rounded-2xl border border-brand-100 shadow-sm">
    <img src="https://img.youtube.com/vi/{{ $id }}/maxresdefault.jpg" alt="{{ $title }}" loading="lazy"
         class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
    <div class="absolute inset-0 flex items-center justify-center bg-black/30 transition group-hover:bg-black/40">
        <span class="flex h-16 w-16 items-center justify-center rounded-full bg-white/95 shadow-lg transition group-hover:scale-110">
            <svg class="h-6 w-6 translate-x-0.5 text-brand-500" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
        </span>
    </div>
    <span class="absolute bottom-3 left-3 rounded-full bg-black/60 px-3 py-1 text-xs font-semibold text-white">
        {{ $title }} — Watch on YouTube
    </span>
</a>
