@extends('layouts.app')

@section('content')

<style>
    /* ============================
           ADMIN DASHBOARD STYLE
        ============================ */
    
    /* Page Title */
    .page-title {
        background: white;
        padding: 20px 25px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        border-left: 5px solid #6C5CE7;
    }

    .page-title h2 {
        color: #2C3E50;
        font-weight: 800;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-title h2 i {
        color: #6C5CE7;
        font-size: 28px;
    }

    .page-title .greeting {
        color: #7F8C8D;
        font-size: 14px;
        font-weight: 600;
    }

    .page-title .greeting span {
        color: #6C5CE7;
        font-weight: 700;
    }

    /* ===== STATISTICS CARDS ===== */
    .stats-row {
        margin-bottom: 30px;
    }

    .stats-card {
        border: none;
        border-radius: 20px;
        padding: 5px;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        border-radius: 20px 20px 0 0;
    }

    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .stats-card .card-body {
        padding: 25px 20px;
        background: white;
        border-radius: 20px;
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .stats-card .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 32px;
        transition: all 0.3s ease;
    }

    .stats-card:hover .icon-wrapper {
        transform: scale(1.1) rotate(-5deg);
    }

    .stats-card .card-title {
        font-weight: 700;
        font-size: 15px;
        color: #7F8C8D;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stats-card .card-number {
        font-size: 42px;
        font-weight: 800;
        margin: 0;
        letter-spacing: -1px;
    }

    .stats-card .card-subtitle {
        font-size: 13px;
        color: #BDC3C7;
        font-weight: 600;
        margin-top: 8px;
        padding-top: 8px;
        border-top: 2px solid #F8F9FA;
    }

    /* Card Variants */
    .card-user::before {
        background: linear-gradient(90deg, #A29BFE, #6C5CE7);
    }

    .card-user .icon-wrapper {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7);
        color: #fff;
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
    }

    .card-user .card-number {
        color: #6C5CE7;
    }

    .card-murid::before {
        background: linear-gradient(90deg, #A8E6CF, #88D8B0);
    }

    .card-murid .icon-wrapper {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        box-shadow: 0 5px 15px rgba(136, 216, 176, 0.3);
    }

    .card-murid .card-number {
        color: #27AE60;
    }

    .card-penilaian::before {
        background: linear-gradient(90deg, #74B9FF, #0984E3);
    }

    .card-penilaian .icon-wrapper {
        background: linear-gradient(135deg, #74B9FF, #0984E3);
        color: #fff;
        box-shadow: 0 5px 15px rgba(9, 132, 227, 0.3);
    }

    .card-penilaian .card-number {
        color: #0984E3;
    }

    .card-guru::before {
        background: linear-gradient(90deg, #FDCB6E, #F39C12);
    }

    .card-guru .icon-wrapper {
        background: linear-gradient(135deg, #FDCB6E, #F39C12);
        color: #fff;
        box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
    }

    .card-guru .card-number {
        color: #F39C12;
    }

    /* ===== RECENT ACTIVITY ===== */
    .recent-section {
        margin-top: 30px;
    }

    .recent-section .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .recent-section .section-header h5 {
        font-weight: 700;
        color: #2C3E50;
        margin: 0;
    }

    .recent-section .section-header h5 i {
        color: #6C5CE7;
        margin-right: 8px;
    }

    .recent-section .section-header a {
        color: #6C5CE7;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .recent-section .section-header a:hover {
        color: #5A4BD1;
        text-decoration: underline;
    }

    .activity-card {
        background: white;
        border-radius: 15px;
        padding: 15px 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 10px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-left: 4px solid #6C5CE7;
    }

    .activity-card:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .activity-card .activity-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .activity-card .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .activity-card .activity-icon.bg-purple {
        background: #EDE7F6;
        color: #6C5CE7;
    }

    .activity-card .activity-icon.bg-success {
        background: #D4EDDA;
        color: #27AE60;
    }

    .activity-card .activity-icon.bg-primary {
        background: #D4E6F1;
        color: #0984E3;
    }

    .activity-card .activity-icon.bg-warning {
        background: #FFF3CD;
        color: #F39C12;
    }

    .activity-card .activity-text {
        font-weight: 600;
        color: #2C3E50;
        margin: 0;
    }

    .activity-card .activity-text small {
        display: block;
        font-weight: 400;
        color: #7F8C8D;
        font-size: 12px;
    }

    .activity-card .activity-time {
        font-size: 12px;
        color: #BDC3C7;
        font-weight: 600;
        white-space: nowrap;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .page-title {
            padding: 15px 20px;
        }

        .page-title h2 {
            font-size: 20px;
        }

        .stats-card .card-body {
            padding: 20px 15px;
        }

        .stats-card .icon-wrapper {
            width: 55px;
            height: 55px;
            font-size: 24px;
        }

        .stats-card .card-number {
            font-size: 32px;
        }

        .stats-card .card-title {
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .page-title {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title .greeting {
            font-size: 13px;
        }

        .stats-card .card-number {
            font-size: 28px;
        }

        .stats-card .icon-wrapper {
            width: 48px;
            height: 48px;
            font-size: 20px;
        }

        .activity-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .activity-card .activity-time {
            align-self: flex-start;
        }
    }

    @media (max-width: 576px) {
        .page-title h2 {
            font-size: 18px;
        }

        .page-title .greeting {
            font-size: 12px;
        }

        .stats-card .card-number {
            font-size: 24px;
        }

        .stats-card .card-title {
            font-size: 12px;
        }

        .stats-card .icon-wrapper {
            width: 42px;
            height: 42px;
            font-size: 18px;
        }

        .stats-card .card-body {
            padding: 15px 12px;
        }

        .activity-card {
            padding: 12px 15px;
        }

        .activity-card .activity-text {
            font-size: 13px;
        }
    }
</style>

<!-- ===== PAGE TITLE ===== -->
<div class="page-title">
    <h2>
        <i class="bi bi-speedometer2"></i>
        Dashboard Admin
    </h2>
    <div class="greeting">
        <i class="bi bi-calendar3"></i>
        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
        <span>|</span>
        Selamat datang, <span>{{ Auth::user()->nama ?? Auth::user()->name }}</span>! 👋
    </div>
</div>

<!-- ===== STATISTICS CARDS ===== -->
<div class="row stats-row g-4">

    <!-- Card: Jumlah User -->
    <div class="col-md-3 col-sm-6">
        <div class="stats-card card-user">
            <div class="card-body">
                <div class="icon-wrapper">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h6 class="card-title">Total User</h6>
                <h1 class="card-number">{{ $totalUser ?? 0 }}</h1>
                <div class="card-subtitle">
                    <i class="bi bi-arrow-up"></i> Aktif
                </div>
            </div>
        </div>
    </div>

    <!-- Card: Jumlah Murid -->
    <div class="col-md-3 col-sm-6">
        <div class="stats-card card-murid">
            <div class="card-body">
                <div class="icon-wrapper">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h6 class="card-title">Total Murid</h6>
                <h1 class="card-number">{{ $totalMurid ?? 0 }}</h1>
                <div class="card-subtitle">
                    <i class="bi bi-person-plus"></i> Terdaftar
                </div>
            </div>
        </div>
    </div>

    <!-- Card: Jumlah Penilaian -->
    <div class="col-md-3 col-sm-6">
        <div class="stats-card card-penilaian">
            <div class="card-body">
                <div class="icon-wrapper">
                    <i class="bi bi-clipboard-data-fill"></i>
                </div>
                <h6 class="card-title">Total Penilaian</h6>
                <h1 class="card-number">{{ $totalPenilaian ?? 0 }}</h1>
                <div class="card-subtitle">
                    <i class="bi bi-check-circle"></i> Selesai
                </div>
            </div>
        </div>
    </div>

    <!-- Card: Jumlah Guru -->
    <div class="col-md-3 col-sm-6">
        <div class="stats-card card-guru">
            <div class="card-body">
                <div class="icon-wrapper">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
                <h6 class="card-title">Total Guru</h6>
                <h1 class="card-number">{{ $totalGuru ?? 0 }}</h1>
                <div class="card-subtitle">
                    <i class="bi bi-star-fill"></i> Aktif
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ===== RECENT ACTIVITY ===== -->
<div class="recent-section">
    <div class="section-header">
        <h5>
            <i class="bi bi-clock-history"></i>
            Aktivitas Terbaru
        </h5>
        <a href="#">
            Lihat Semua <i class="bi bi-arrow-right"></i>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="activity-card" style="border-left-color: #6C5CE7;">
                <div class="activity-info">
                    <div class="activity-icon bg-purple">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <div>
                        <p class="activity-text">
                            User baru terdaftar: <strong>Admin Baru</strong>
                            <small>Role: Admin</small>
                        </p>
                    </div>
                </div>
                <div class="activity-time">
                    <i class="bi bi-clock"></i> 5 menit lalu
                </div>
            </div>

            <div class="activity-card" style="border-left-color: #27AE60;">
                <div class="activity-info">
                    <div class="activity-icon bg-success">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <div>
                        <p class="activity-text">
                            Murid baru terdaftar: <strong>Anisa Rahma</strong>
                            <small>Kelas B, RA Ceria</small>
                        </p>
                    </div>
                </div>
                <div class="activity-time">
                    <i class="bi bi-clock"></i> 2 jam lalu
                </div>
            </div>

            <div class="activity-card" style="border-left-color: #0984E3;">
                <div class="activity-info">
                    <div class="activity-icon bg-primary">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div>
                        <p class="activity-text">
                            Penilaian baru: <strong>Budi Santoso</strong>
                            <small>Kategori: BSH (Berkembang Sesuai Harapan)</small>
                        </p>
                    </div>
                </div>
                <div class="activity-time">
                    <i class="bi bi-clock"></i> 3 jam lalu
                </div>
            </div>

            <div class="activity-card" style="border-left-color: #F39C12;">
                <div class="activity-info">
                    <div class="activity-icon bg-warning">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div>
                        <p class="activity-text">
                            Laporan bulanan <strong>Agustus 2026</strong> telah dibuat
                            <small>Total 15 murid dinilai</small>
                        </p>
                    </div>
                </div>
                <div class="activity-time">
                    <i class="bi bi-clock"></i> 1 hari lalu
                </div>
            </div>

        </div>
    </div>
</div>

@endsection