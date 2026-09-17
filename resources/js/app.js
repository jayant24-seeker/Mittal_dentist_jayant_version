import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Subtle scroll-reveal: content is visible by default (no FOUC, no
// dependency on JS loading), animation only *adds* a fade/slide-in.
// Respects prefers-reduced-motion by doing nothing at all.
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('[data-reveal]').forEach((el) => observer.observe(el));
}
