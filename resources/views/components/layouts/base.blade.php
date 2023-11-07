<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical" class="light"
      data-header-styles="light" data-menu-styles="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'ESM' }}</title>
    @vite(['resources/scss/app.scss', 'resources/scss/icons.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>
<body>
    @yield('content')
    {{ $slot }}
</body>
</html>
