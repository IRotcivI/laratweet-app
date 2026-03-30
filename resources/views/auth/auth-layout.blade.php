<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_auth/assets/css/templatemo-glass-admin-style.css') }}">

    <style>
        .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
        }   

        .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
        }   

        .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
        color: white;
        }

        .colored-toast .swal2-close {
        color: white;
        }

        .colored-toast .swal2-html-container {
        color: white;
        }

    </style>

</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="login-page">
        <!-- Theme Toggle -->
        <button class="theme-toggle-float" id="theme-toggle" title="Toggle Light/Dark Mode">
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/>
                <path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/>
                <path d="M2 12h2"/><path d="M20 12h2"/>
                <path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>
            </svg>
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
            </svg>
        </button>

        @yield('notif')

        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="login-logo">LT</div>
                    <h1 class="login-title">@yield('card_title')</h1>
                </div>

                @yield('auth_form')

            </div>
        </div>

        <!-- Footer -->
        <footer class="site-footer">
            <p>Victor FAYE</a></p>
        </footer>
    </div>

    <script src="{{ asset('back_auth/assets/js/templatemo-glass-admin-script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>