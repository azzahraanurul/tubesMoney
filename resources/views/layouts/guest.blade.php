<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Money</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/money.css') }}?v=99">
</head>

<body>
    <main class="auth-page">
        {{ $slot }}
    </main>

    @if ($errors->any())
        <div id="errorToast" class="money-toast">
            {{ $errors->first() }}
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('errorToast');
                if (toast) {
                    toast.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
</body>
</html>