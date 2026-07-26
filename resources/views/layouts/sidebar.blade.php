<!-- resources/views/layouts/sidebar.blade.php -->

<div class="col-md-2 sidebar-custom p-0">
    <div class="sidebar-menu">

        <!-- Profile Section -->
        <div class="sidebar-profile">
            <div class="profile-avatar">
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="profile-info">
                <h6>{{ Auth::user()->name }}</h6>
                <span class="badge role-badge">
                    @if(Auth::user()->role == "admin")
                        <i class="bi bi-shield-check"></i> Admin
                    @else
                        <i class="bi bi-star-fill"></i> Guru
                    @endif
                </span>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        <!-- Menu Items -->
        <div class="nav flex-column">

            @if(Auth::user()->role == "admin")
                <!-- Admin Menu -->
                <div class="sidebar-label">Admin Panel</div>

                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-fill"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Data User</span>
                </a>
            @endif

            @if(Auth::user()->role == "guru")
                <!-- Guru Menu -->
                <div class="sidebar-label">Menu Utama</div>

                <a href="{{ route('guru.dashboard') }}"
                   class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-fill"></i>
                    <span>Dashboard</span>
                </a>

                <div class="sidebar-divider"></div>
                <div class="sidebar-label">Manajemen</div>

                <a href="{{ route('murid.index') }}"
                   class="nav-link {{ request()->routeIs('murid.index') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Murid</span>
                </a>

                <a href="{{ route('penilaian.index') }}"
                   class="nav-link {{ request()->routeIs('penilaian.index') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-data-fill"></i>
                    <span>Penilaian</span>
                </a>

                <a href="{{ route('laporan') }}"
                   class="nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Laporan</span>
                </a>
            @endif

            <div class="sidebar-divider"></div>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </div>
</div>

<style>
    /* ============================
           SIDEBAR STYLE
        ============================ */
    .sidebar-custom {
        background: linear-gradient(180deg, #FF6B6B 0%, #FF8E8E 4%, #FFF8F0 18%, #FFFFFF 100%);
        min-height: 100vh;
        box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        z-index: 1040;
        overflow-y: auto;
        transition: all 0.3s ease;
        padding: 120px 0 20px;
    }

    /* ===== SCROLLBAR ===== */
    .sidebar-custom::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar-custom::-webkit-scrollbar-track {
        background: #FFF5F5;
    }

    .sidebar-custom::-webkit-scrollbar-thumb {
        background: #FFB3B3;
        border-radius: 10px;
    }

    .sidebar-custom::-webkit-scrollbar-thumb:hover {
        background: #FF6B6B;
    }

    /* ===== PROFILE SECTION ===== */
    .sidebar-profile {
        padding: 0 20px 20px;
        border-bottom: 2px solid #FFF0F0;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile-avatar {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #FF6B6B, #FFB3B3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 3px 10px rgba(255, 107, 107, 0.2);
    }

    .profile-info h6 {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #2C3E50;
        line-height: 1.3;
    }

    .profile-info .role-badge {
        font-size: 11px;
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 600;
        background: #FFF0F0;
        color: #FF6B6B;
        border: 1px solid #FFE0E0;
    }

    .profile-info .role-badge i {
        margin-right: 4px;
    }

    /* ===== SIDEBAR DIVIDER ===== */
    .sidebar-divider {
        border-top: 2px solid #FFF0F0;
        margin: 10px 20px;
    }

    /* ===== SIDEBAR LABEL ===== */
    .sidebar-label {
        padding: 0 20px;
        font-size: 11px;
        font-weight: 700;
        color: #BDC3C7;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
        margin-top: 5px;
    }

    /* ===== NAV LINKS ===== */
    .sidebar-custom .nav-link {
        color: #4A4A4A;
        font-weight: 600;
        padding: 12px 20px;
        border-radius: 12px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 2px 12px;
        text-decoration: none;
        position: relative;
    }

    .sidebar-custom .nav-link i {
        font-size: 20px;
        color: #FFB3B3;
        transition: all 0.3s ease;
        width: 24px;
        text-align: center;
        flex-shrink: 0;
    }

    .sidebar-custom .nav-link span {
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .sidebar-custom .nav-link:hover {
        background: #FFF5F5;
        color: #FF6B6B;
        transform: translateX(5px);
    }

    .sidebar-custom .nav-link:hover i {
        color: #FF6B6B;
        transform: scale(1.1);
    }

    .sidebar-custom .nav-link.active {
        background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
        color: #fff;
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.25);
    }

    .sidebar-custom .nav-link.active i {
        color: #fff;
    }

    .sidebar-custom .nav-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 30px;
        background: #FFE66D;
        border-radius: 0 4px 4px 0;
    }

    /* ===== LOGOUT BUTTON ===== */
    .logout-form {
        padding: 0 12px;
        margin-top: 10px;
    }

    .btn-logout {
        width: 100%;
        padding: 12px 20px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(255, 107, 107, 0.2);
    }

    .btn-logout i {
        font-size: 20px;
        width: 24px;
        text-align: center;
    }

    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        background: linear-gradient(135deg, #FF5252, #FF6B6B);
    }

    .btn-logout:active {
        transform: translateY(0);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .sidebar-custom {
            transform: translateX(-100%);
            width: 280px;
            position: fixed;
            top: 86px;
            left: 0;
            bottom: 0;
            z-index: 1040;
            background: #fff;
            padding-top: 20px;
        }

        .sidebar-custom.show {
            transform: translateX(0);
        }
    }

    @media (max-width: 576px) {
        .sidebar-custom {
            width: 100%;
            max-width: 300px;
        }

        .sidebar-custom .nav-link {
            padding: 10px 16px;
            margin: 2px 8px;
        }

        .sidebar-custom .nav-link span {
            font-size: 13px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            font-size: 22px;
        }

        .profile-info h6 {
            font-size: 13px;
        }
    }
</style>

<!-- ===== SIDEBAR OVERLAY (untuk mobile) ===== -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<style>
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
</style>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar-custom');
        const overlay = document.getElementById('sidebarOverlay');

        if (sidebar) {
            sidebar.classList.toggle('show');
        }
        if (overlay) {
            overlay.classList.toggle('show');
        }
    }

    // Tutup sidebar saat resize ke desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            const sidebar = document.querySelector('.sidebar-custom');
            const overlay = document.getElementById('sidebarOverlay');
            if (sidebar) sidebar.classList.remove('show');
            if (overlay) overlay.classList.remove('show');
        }
    });

    // Tutup sidebar saat klik di luar
    document.addEventListener('click', function(e) {
        const sidebar = document.querySelector('.sidebar-custom');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.querySelector('.sidebar-toggle');

        if (window.innerWidth <= 992) {
            if (sidebar && !sidebar.contains(e.target) &&
                toggleBtn && !toggleBtn.contains(e.target) &&
                overlay && overlay.classList.contains('show')) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        }
    });
</script>