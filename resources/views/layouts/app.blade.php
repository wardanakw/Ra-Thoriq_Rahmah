<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Penilaian Perkembangan Anak RA</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================
               GLOBAL STYLE
            ============================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #FFF5F5, #FFF8F0, #F0FFF4);
            min-height: 100vh;
            padding-top: 94px;
            display: flex;
            flex-direction: column;
        }

        /* ============================
               NAVBAR
            ============================ */
        .navbar-custom {
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E, #FFB3B3) !important;
            padding: 12px 0;
            box-shadow: 0 4px 20px rgba(255, 107, 107, 0.25);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            border-bottom: 4px solid #FFE66D;
        }

        .navbar-custom .navbar-brand {
            color: #fff !important;
            font-weight: 800;
            font-size: 22px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-custom .navbar-brand i {
            font-size: 28px;
            color: #FFE66D;
        }

        .navbar-custom .navbar-brand small {
            font-size: 14px;
            font-weight: 400;
            opacity: 0.9;
            display: block;
            margin-top: -2px;
        }

        .navbar-custom .nav-link {
            color: #fff !important;
            font-weight: 600;
            padding: 8px 18px !important;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .navbar-custom .nav-link i {
            margin-right: 8px;
        }

        .navbar-custom .nav-link.active {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .dropdown-menu {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-top: 10px;
        }

        .navbar-custom .dropdown-item {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .navbar-custom .dropdown-item:hover {
            background: #FFF5F5;
            color: #FF6B6B;
            transform: translateX(5px);
        }

        .navbar-custom .dropdown-item i {
            margin-right: 10px;
            color: #FF6B6B;
        }

        .navbar-toggler {
            border: 2px solid #fff;
            padding: 8px 12px;
            border-radius: 10px;
        }

        .navbar-toggler-icon {
            filter: brightness(0) invert(1);
        }

        /* ============================
               SIDEBAR
            ============================ */
        .sidebar-custom {
            background: #fff;
            min-height: calc(100vh - 70px);
            padding: 25px 0;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            width: 250px;
            z-index: 1040;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-custom .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 2px solid #FFF0F0;
            margin-bottom: 20px;
        }

        .sidebar-custom .sidebar-header h6 {
            color: #FF6B6B;
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .sidebar-custom .sidebar-header p {
            color: #7F8C8D;
            font-size: 12px;
            margin-bottom: 0;
        }

        .sidebar-custom .nav-item {
            margin: 3px 12px;
        }

        .sidebar-custom .nav-link {
            color: #4A4A4A;
            font-weight: 600;
            padding: 12px 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-custom .nav-link i {
            font-size: 20px;
            color: #FFB3B3;
            transition: all 0.3s ease;
            width: 24px;
            text-align: center;
        }

        .sidebar-custom .nav-link:hover {
            background: #FFF5F5;
            color: #FF6B6B;
            transform: translateX(5px);
        }

        .sidebar-custom .nav-link:hover i {
            color: #FF6B6B;
        }

        .sidebar-custom .nav-link.active {
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
            color: #fff;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.25);
        }

        .sidebar-custom .nav-link.active i {
            color: #fff;
        }

        .sidebar-divider {
            border-top: 2px solid #FFF0F0;
            margin: 15px 20px;
        }

        .sidebar-label {
            padding: 0 20px;
            font-size: 11px;
            font-weight: 700;
            color: #BDC3C7;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        /* ============================
               MAIN CONTENT
            ============================ */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: calc(100vh - 70px);
            animation: fadeIn 0.5s ease;
            flex: 1;
        }

        /* ============================
               SIDEBAR TOGGLE (Mobile)
            ============================ */
        .sidebar-toggle {
            display: none;
            background: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 12px;
            color: #FF6B6B;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.2);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1030;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* ============================
               ANIMATIONS
            ============================ */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================
               SCROLLBAR
            ============================ */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #FFF5F5;
        }

        ::-webkit-scrollbar-thumb {
            background: #FFB3B3;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF6B6B;
        }

        /* ============================
               RESPONSIVE
            ============================ */
        @media (max-width: 992px) {
            .sidebar-custom {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar-custom.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            body {
                padding-top: 86px;
            }

            .navbar-custom .navbar-brand {
                font-size: 18px;
            }

            .navbar-custom .navbar-brand small {
                font-size: 12px;
            }

            .sidebar-toggle {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px;
            }

            .navbar-custom {
                padding: 8px 0;
            }

            .navbar-custom .navbar-brand {
                font-size: 16px;
            }

            .navbar-custom .navbar-brand i {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    @include('layouts.navbar')

    <!-- ===== SIDEBAR OVERLAY ===== -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- ===== SIDEBAR ===== -->
    @include('layouts.sidebar')

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content" id="mainContent">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    @include('layouts.footer')

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /**
         * Toggle Sidebar untuk mobile
         */
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        /**
         * Tutup sidebar otomatis saat resize ke desktop
         */
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (window.innerWidth > 992) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        });

        /**
         * Set active menu berdasarkan URL
         */
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.sidebar-custom .nav-link');

            navLinks.forEach(function(link) {
                const href = link.getAttribute('href');
                if (href && currentPath.includes(href)) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>
</html>