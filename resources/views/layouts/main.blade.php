<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @stack('css')

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        main {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <main class="d-flex flex-column">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">My Application</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link {{ request()->is('home*') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                        <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">Post</a>
                        @if (auth()->user() && auth()->user()->role == 'admin')
                            <a class="nav-link {{ request()->is('accounts*') ? 'active' : '' }}"
                                href="{{ route('accounts.index') }}">Akun</a>
                        @endif
                        @auth
                            <a class="nav-link" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout
                                ({{ auth()->user()->username }})
                            </a>
                            <form action="{{ route('auth.logout') }}" id="logout" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex-grow-1">
            @yield('content')
        </div>
        <footer class="navbar bg-body-tertiary py-3 mt-5 border-top">
            <div class="container">
                <div>&copy; My Company {{ date('Y') }}</div>
                <div>Powered by <a href="laravel.com">Laravel</a></div>
            </div>
        </footer>
    </main>
    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
