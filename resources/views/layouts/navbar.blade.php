<!-- resources/views/layouts/navbar.blade.php -->

<nav class="navbar navbar-custom navbar-expand-lg">
    <div class="container-fluid">

        @php
            $brandRoute = auth()->check()
                ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('guru.dashboard'))
                : route('login');
        @endphp

        <!-- Sidebar Toggle (Mobile) -->
        <button class="sidebar-toggle" type="button" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{ $brandRoute }}">
            <i class="bi bi-stars"></i>
            <div>
                RA THORIQUR RAHMAH
                <small>Sistem Penilaian Perkembangan Anak</small>
            </div>
        </a>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- Notification (optional)
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Notifikasi">
                        <i class="bi bi-bell-fill"></i>
                        <span class="notif-badge">3</span>
                    </a>
                </li> -->

                <!-- User Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle user-profile" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="user-name">
                            @if(Auth::check())
                                {{ Auth::user()->nama ?? Auth::user()->name }}
                            @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person"></i> Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i> Pengaturan
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</nav>

<style>
    /* ============================
           NAVBAR STYLE
        ============================ */
    .navbar-custom {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 50%, #FFB3B3 100%) !important;
        padding: 12px 0;
        box-shadow: 0 4px 20px rgba(255, 107, 107, 0.25);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1050;
        border-bottom: 4px solid #FFE66D;
        min-height: 70px;
    }

    /* ===== BRAND ===== */
    .navbar-custom .navbar-brand {
        color: #fff !important;
        font-weight: 800;
        font-size: 22px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0;
    }

    .navbar-custom .navbar-brand i {
        font-size: 32px;
        color: #FFE66D;
        animation: float 3s ease-in-out infinite;
    }

    .navbar-custom .navbar-brand div {
        line-height: 1.2;
    }

    .navbar-custom .navbar-brand small {
        font-size: 12px;
        font-weight: 400;
        opacity: 0.9;
        display: block;
        margin-top: -2px;
        color: rgba(255, 255, 255, 0.9);
    }

    /* ===== NAV LINKS ===== */
    .navbar-custom .nav-link {
        color: #fff !important;
        font-weight: 600;
        padding: 8px 16px !important;
        border-radius: 50px;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .navbar-custom .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .navbar-custom .nav-link i {
        font-size: 20px;
        color: #FFE66D;
    }

    /* ===== NOTIFICATION BADGE ===== */
    .notif-badge {
        position: absolute;
        top: 0;
        right: 4px;
        background: #FFE66D;
        color: #FF6B6B;
        font-size: 10px;
        font-weight: 800;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #FF6B6B;
    }

    /* ===== USER PROFILE ===== */
    .user-profile {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px !important;
        border-radius: 50px !important;
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .user-profile:hover {
        background: rgba(255, 255, 255, 0.25) !important;
        border-color: rgba(255, 255, 255, 0.4);
    }

    .user-profile i {
        font-size: 24px;
        color: #FFE66D !important;
    }

    .user-name {
        font-weight: 700;
        font-size: 14px;
        color: #fff;
    }

    /* ===== DROPDOWN ===== */
    .navbar-custom .dropdown-menu {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        padding: 10px;
        margin-top: 12px;
        min-width: 200px;
        background: #fff;
        animation: slideDown 0.3s ease;
    }

    .navbar-custom .dropdown-item {
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 600;
        font-size: 14px;
        color: #4A4A4A;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        border: none;
        background: none;
        width: 100%;
    }

    .navbar-custom .dropdown-item i {
        font-size: 18px;
        color: #FFB3B3;
        transition: all 0.3s ease;
        width: 22px;
        text-align: center;
    }

    .navbar-custom .dropdown-item:hover {
        background: #FFF5F5;
        color: #FF6B6B;
        transform: translateX(5px);
    }

    .navbar-custom .dropdown-item:hover i {
        color: #FF6B6B;
    }

    .navbar-custom .dropdown-item.text-danger:hover {
        background: #FFF0F0;
        color: #E74C3C;
    }

    .navbar-custom .dropdown-item.text-danger:hover i {
        color: #E74C3C;
    }

    .navbar-custom .dropdown-divider {
        border-top: 2px solid #FFF0F0;
        margin: 8px 0;
    }

    /* ===== SIDEBAR TOGGLE (Mobile) ===== */
    .sidebar-toggle {
        display: none;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 8px 12px;
        color: #fff;
        font-size: 22px;
        transition: all 0.3s ease;
        margin-right: 10px;
    }

    .sidebar-toggle:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    /* ===== NAVBAR TOGGLER ===== */
    .navbar-toggler {
        border: 2px solid rgba(255, 255, 255, 0.4);
        padding: 8px 12px;
        border-radius: 12px;
    }

    .navbar-toggler-icon {
        filter: brightness(0) invert(1);
    }

    /* ===== ANIMATIONS ===== */
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .sidebar-toggle {
            display: block;
        }

        .navbar-custom {
            padding: 10px 0;
            min-height: 60px;
        }

        .navbar-custom .navbar-brand {
            font-size: 18px;
        }

        .navbar-custom .navbar-brand i {
            font-size: 26px;
        }

        .navbar-custom .navbar-brand small {
            font-size: 11px;
        }

        .user-name {
            font-size: 13px;
        }

        .navbar-custom .dropdown-menu {
            margin-top: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
    }

    @media (max-width: 576px) {
        .navbar-custom {
            padding: 8px 0;
            min-height: 56px;
        }

        .navbar-custom .navbar-brand {
            font-size: 15px;
        }

        .navbar-custom .navbar-brand i {
            font-size: 20px;
        }

        .navbar-custom .navbar-brand small {
            font-size: 10px;
        }

        .user-name {
            font-size: 12px;
        }

        .user-profile i {
            font-size: 20px;
        }

        .navbar-custom .nav-link {
            padding: 6px 12px !important;
            font-size: 13px;
        }

        .notif-badge {
            width: 16px;
            height: 16px;
            font-size: 8px;
            right: 2px;
        }
    }
</style>