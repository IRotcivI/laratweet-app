<!DOCTYPE html>
<html lang="fr">
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
    <title>Emerald Chronicles | Accueil</title>
    
    <!-- Styles -->
    @include('front.partials.styles')
    <!-- End styles -->

</head>
<body class="bg-gradient">

    <!-- Sidebar -->
    @yield('sidebar')
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

    <!-- Footer -->
    @include('front.partials.footer')
    <!-- End footer -->

    <!-- Scripts -->
    @include('front.partials.scripts')
    <!-- End scripts -->
</body>
</html>