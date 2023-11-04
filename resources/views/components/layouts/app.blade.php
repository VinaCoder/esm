<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'ESM' }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}
</body>
</html>
