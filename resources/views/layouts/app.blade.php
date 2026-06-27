<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Money App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#F4F2F3] text-[#212121]">

    <div class="min-h-screen bg-[#F4F2F3]">

        <!-- Navbar -->
        <nav class="bg-[#008080] shadow-sm border-b border-[#007070]">
            @include('layouts.navigation')
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-[#F4F2F3]">
                <div class="pt-6 pb-3 bg-[#F4F2F3]">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="bg-[#F4F2F3]">
            {{ $slot }}
        </main>

    </div>

    <!-- TOAST ERROR -->
    @if ($errors->any())
        <div id="toast-error" class="fixed top-5 right-5 bg-red-500 text-white px-5 py-3 rounded shadow-lg z-50">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- TOAST SUCCESS -->
    @if (session('success'))
        <div id="toast-success" class="fixed top-5 right-5 bg-green-500 text-white px-5 py-3 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    <script>
        setTimeout(() => {
            const error = document.getElementById('toast-error');
            const success = document.getElementById('toast-success');

            if (error) error.style.display = 'none';
            if (success) success.style.display = 'none';
        }, 3000);
    </script>

</body>
</html>