<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fluido Certo')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --bs-primary: #4f46e5;
            --bs-primary-rgb: 79, 70, 229;
        }
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-droplet-fill me-2" viewBox="0 0 16 16">
                    <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c-.75.001-2.25 1.676-3.568 3.638C3.122 5.096 2 6.345 2 10a6 6 0 0 0 6 6"/>
                </svg>
                Fluido Certo
            </a>

            <div class="ms-auto">
                @if (Route::has('login'))
                    <div class="text-end">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary ms-2">Registrar</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mt-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="text-center text-muted mt-5 py-3 bg-white">
        <p class="mb-0">&copy; {{ date('Y') }} Fluido Certo. Todos os direitos reservados.</p>
    </footer>

    @stack('scripts')
</body>
</html>