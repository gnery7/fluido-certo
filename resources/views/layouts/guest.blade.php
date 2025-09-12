<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Fluido Certo') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-light d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-droplet-fill me-2" viewBox="0 0 16 16">
                        <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c-.75.001-2.25 1.676-3.568 3.638C3.122 5.096 2 6.345 2 10a6 6 0 0 0 6 6"/>
                    </svg>
                    Fluido Certo
                </a>
            </div>
        </nav>
        <main class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card shadow-sm w-100" style="max-width: 400px;">
                <div class="card-body">
                    <h2 class="text-center text-primary mb-4">Bem-vindo</h2>
                    <p class="text-center text-muted mb-4">Este acesso é destinado para uso interno e administrativo.</p>
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="text-center text-muted mt-5 py-3 bg-white">
            <p class="mb-0">&copy; {{ date('Y') }} Fluido Certo. Todos os direitos reservados.</p>
        </footer>
    </body>
</html>