@props(['title' => null, 'description' => null])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' | ' . config('clinic.name') : config('clinic.name') . ' — Best Dental Clinic in Jaipur' }}</title>
    <meta name="description" content="{{ $description ?? 'Mittal Dental Clinic, Nirman Nagar, Jaipur — implants, root canal, orthodontics and general dentistry since 2004.' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-ink antialiased">
    @include('partials.header')

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')
    @include('partials.mobile-cta-bar')
</body>
</html>
