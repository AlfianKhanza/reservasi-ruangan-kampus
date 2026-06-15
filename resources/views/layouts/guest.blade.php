<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reservasi Ruangan Kampus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div
    class="min-h-screen bg-cover bg-center"
    style="
        background-image: url('{{ asset('images/login-bg.jpeg') }}');
        background-size: cover;
        background-position: center;
    "
>

    <div class="min-h-screen bg-blue-900/30 flex items-center">

        <div class="grid md:grid-cols-2 gap-12 items-center w-full max-w-7xl mx-auto px-10">

            <!-- KIRI -->
            <div class="text-white hidden md:block">

                <h1 class="text-6xl font-extrabold leading-tight mb-6 drop-shadow-lg">
                    Reservasi Ruangan Kampus
                </h1>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mb-8"></div>

                <p class="text-2xl leading-relaxed font-medium">
                    Sistem Informasi Reservasi Ruangan Kampus.
                </p>

                <p class="text-xl leading-relaxed mt-4 text-gray-100">
                    Kelola penggunaan ruangan dengan mudah,
                    cepat, dan efisien.
                </p>

                <div class="mt-12 text-sm text-gray-200">
                    © 2026 Sistem Reservasi Ruangan Kampus
                </div>

            </div>

            <!-- KANAN -->
            <div
                class="
                bg-white/90
                backdrop-blur-md
                border border-white/40
                rounded-3xl
                shadow-2xl
                p-10
                w-full
                max-w-lg
                mx-auto
                transition-all
                duration-300
                hover:shadow-blue-500/30
                "
            >

                {{ $slot }}

            </div>

        </div>

    </div>

</div>

</body>
</html>