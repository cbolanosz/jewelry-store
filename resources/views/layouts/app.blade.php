{{-- Author: Cristian Bolaños --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', __('app.brand'))</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-store py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home.index') }}">
                <span class="brand-logo">{{ __('app.brand_short') }}</span>
                <span class="brand-name">{{ __('app.brand') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#storeNavbar" aria-controls="storeNavbar" aria-expanded="false" aria-label="{{ __('app.toggle_navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="storeNavbar">
                <div class="navbar-nav ms-auto align-items-lg-center">
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('app.nav_home') }}</a>
                    <a class="nav-link" href="{{ route('product.index') }}">{{ __('app.nav_products') }}</a>
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('app.nav_login') }}</a>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('app.nav_register') }}</a>
                    @else
                        @if (Auth::user()->getRole() === 'admin')
                            <a class="nav-link" href="{{ route('admin.home.index') }}">{{ __('app.nav_admin') }}</a>
                        @endif
                        <a class="nav-link" href="{{ route('order.index') }}">{{ __('app.nav_orders') }}</a>
                        <span class="nav-link user-name">{{ Auth::user()->getFirstName() }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">{{ __('app.nav_logout') }}</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @if (session('status'))
            <div class="container pt-4">
                <div class="alert alert-success mb-0">{{ session('status') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="container pt-4">
                <div class="alert alert-danger mb-0">{{ session('error') }}</div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-store text-center py-4">
        <div class="container">
            <p class="brand-name mb-1">{{ __('app.brand') }}</p>
            <small class="text-secondary">{{ __('app.tagline') }} · {{ __('app.footer_team') }}</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
