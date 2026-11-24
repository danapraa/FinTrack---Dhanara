<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#faf7f2">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' · ' : '' }}{{ config('app.name') }}</title>

    {{-- Terapkan tema sebelum halaman tampil, supaya tidak berkedip --}}
    <script>
        (function () {
            try {
                var m = localStorage.getItem('dhanara-theme') || 'light';
                var dark = m === 'dark' || (m === 'system' && matchMedia('(prefers-color-scheme: dark)').matches);
                if (dark) {
                    document.documentElement.classList.add('dark');
                    document.querySelector('meta[name="theme-color"]').setAttribute('content', '#151715');
                }
            } catch (e) {}
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-dvh">
    {{ $slot }}
</body>
</html>
