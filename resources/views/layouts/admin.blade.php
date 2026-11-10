{{-- Author: Cristian Bolaños --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>@yield('title', __('admin.panel'))</title>
</head>
<body>
    <div class="d-flex min-vh-100">
        <aside class="admin-sidebar d-flex flex-column p-3">
            <a class="admin-brand d-flex align-items-center gap-2 mb-4" href="{{ route('admin.home.index') }}">
                <span class="admin-logo">{{ __('app.brand_short') }}</span>
                <span>{{ __('admin.panel') }}</span>
            </a>
            <nav class="nav nav-pills flex-column gap-1">
                <a class="nav-link" href="{{ route('admin.home.index') }}">{{ __('admin.dashboard') }}</a>
                <a class="nav-link" href="{{ route('admin.category.index') }}">{{ __('admin.nav_categories') }}</a>
                <a class="nav-link" href="{{ route('admin.product.index') }}">{{ __('admin.nav_products') }}</a>
            </nav>
        </aside>

        <div class="flex-grow-1 d-flex flex-column">
            <header class="admin-header d-flex justify-content-between align-items-center px-4 py-3">
                <h1 class="h5 mb-0">@yield('subtitle', __('admin.dashboard'))</h1>
                <div class="d-flex align-items-center gap-2">
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('app.language') }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{ route('language.switch', ['locale' => 'en']) }}">{{ __('app.language_english') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', ['locale' => 'es']) }}">{{ __('app.language_spanish') }}</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('home.index') }}">{{ __('admin.back_to_store') }}</a>
                </div>
            </header>

            <main class="flex-grow-1 p-4">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
