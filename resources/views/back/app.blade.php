<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/templatemo-glass-admin-style.css') }}">
    <!-- Styles (link) -->
    @include('back.partials.styles')
    <!-- End styles -->

</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">

        <!-- Sidebar -->
        @include('back.partials.sidebar')
        <!-- End sidebar -->

        <!-- Main Content -->
        <main class="main-content">

            <!-- Header -->
            @yield('header')
            <!-- End header -->

            <!-- Content -->
            @yield('content')
            <!-- End content -->

        </main>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <!-- Footer -->
    <footer class="site-footer">
        <p>Victor FAYE</a></p>
    </footer>

    <!-- Scripts (link) -->
    @include('back.partials.scripts')

    @if (session()->get('error'))
        <script>
            iziToast.error({
                class: 'glass-toast',
                backgroundColor: 'rgba(5, 150, 105, 0.3)',
                progressBarColor: '#10b981',
                title: 'Erreur',
                position: 'topRight',
                message: '{{ session()->get('error') }}'
            });
        </script>
    @endif

    @if (session()->get('success'))
        <script>
            iziToast.success({
                class: 'glass-toast',
                backgroundColor: 'rgba(5, 150, 105, 0.3)',
                progressBarColor: '#10b981',
                title: 'Succès',
                position: 'topRight',
                message: '{{ session()->get('success') }}'
            });
        </script>
    @endif
    <!-- End scripts -->

</body>

</html>
