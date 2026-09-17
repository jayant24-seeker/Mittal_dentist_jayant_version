{{-- Sticky mobile-only action bar: call and book-appointment are always
     one tap away, satisfying the "reachable within 2 taps on mobile" requirement. --}}
<div class="lg:hidden fixed inset-x-0 bottom-0 z-40 grid grid-cols-2 border-t border-brand-100 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.06)]">
    <a href="tel:{{ config('clinic.primary_call_tel') }}"
       class="flex items-center justify-center gap-2 py-3.5 text-sm font-semibold text-ink border-r border-brand-100">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call Now
    </a>
    <a href="{{ route('contact') }}#appointment-form"
       class="flex items-center justify-center gap-2 bg-brand-500 py-3.5 text-sm font-semibold text-white">
        Book Appointment
    </a>
</div>

{{-- Spacer so the fixed bar never covers footer content on mobile --}}
<div class="h-14 lg:hidden"></div>
