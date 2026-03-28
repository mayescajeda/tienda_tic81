<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8f9fa !important;
        }

        .min-h-screen {
            background-color: #f8f9fa !important;
        }

        header.bg-white {
            background: linear-gradient(to right, #ffffff, #f7faff) !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow-sm border-bottom mb-4">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="h4 fw-bold text-dark mb-0">
                                <i class="bi bi-stars text-primary me-2"></i>
                                @auth
                                    {{ __('Bienvenido/a') }}, <span class="text-primary">{{ Auth::user()->name }}</span>
                                @else
                                    {{ __('Bienvenido a DVC Clothing') }}
                                @endauth
                            </h2>
                            <p class="text-muted small mb-0">
                                @auth
                                    ¡Qué gusto verte de nuevo! Explora nuestras novedades.
                                @else
                                    Inicia sesión para una experiencia personalizada.
                                @endauth
                            </p>
                        </div>

                        <div class="d-none d-sm-block">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="bi bi-bag-heart me-1"></i> Ir a la tienda
                            </a>
                        </div>
                    </div>
                </div>
            </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
