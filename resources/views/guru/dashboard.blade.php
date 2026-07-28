@extends('layouts.app')

@section('content')

<style>
    /* ============================
           DASHBOARD STYLE
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
        border-left: 5px solid #FF6B6B;
    }

    .page-title h2 {
        color: #2C3E50;
        font-weight: 800;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-title h2 i {
        color: #FF6B6B;
    }

    .page-title .greeting {
        color: #7F8C8D;
        font-size: 14px;
        font-weight: 600;
    }

    .page-title .greeting span {
        color: #FF6B6B;
    }

    /* ===== DASHBOARD CARDS ===== */
    .dashboard-card {
        border: none;
        border-radius: 20px;
        padding: 5px;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        border-radius: 20px 20px 0 0;
    }

    .dashboard-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .dashboard-card .card-body {
        padding: 30px 20px;
        background: white;
        border-radius: 20px;
        position: relative;
        z-index: 1;
    }

    .dashboard-card .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 32px;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover .icon-wrapper {
        transform: scale(1.1) rotate(-5deg);
    }

    .dashboard-card .card-title {
        font-weight: 700;
        font-size: 16px;
        color: #4A4A4A;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .dashboard-card .card-number {
        font-size: 42px;
        font-weight: 800;
        margin: 5px 0;
        letter-spacing: -1px;
    }

    .dashboard-card .card-subtitle {
        font-size: 13px;
        color: #BDC3C7;
        font-weight: 600;
        margin-top: 5px;
    }

    /* Card Variants */
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

    .card-hasil::before {
        background: linear-gradient(90deg, #FDCB6E, #F39C12);
    }

    .card-hasil .icon-wrapper {
        background: linear-gradient(135deg, #FDCB6E, #F39C12);
        color: #fff;
        box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
    }

    .card-hasil .card-number {
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
        color: #FF6B6B;
        margin-right: 8px;
    }

    .recent-section .section-header a {
        color: #FF6B6B;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .recent-section .section-header a:hover {
        color: #FF5252;
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
        border-left: 4px solid #FF6B6B;
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
    @media (max-width: 768px) {
        .page-title {
            padding: 15px 20px;
        }

        .page-title h2 {
            font-size: 20px;
        }

        .dashboard-card .card-body {
            padding: 20px 15px;
        }

        .dashboard-card .icon-wrapper {
            width: 55px;
            height: 55px;
            font-size: 26px;
        }

        .dashboard-card .card-number {
            font-size: 32px;
        }

        .dashboard-card .card-title {
            font-size: 14px;
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

        .dashboard-card .card-number {
            font-size: 28px;
        }

        .dashboard-card .icon-wrapper {
            width: 48px;
            height: 48px;
            font-size: 22px;
        }
    }
</style>

<!-- ===== PAGE TITLE ===== -->
<div class="page-title">
    <h2>
        <i class="bi bi-house-fill"></i>
        Dashboard Guru
    </h2>
    <div class="greeting">
        <i class="bi bi-calendar3"></i>
        {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
        <span>|</span>
        Selamat datang, <span>{{ Auth::user()->nama ?? Auth::user()->name }}</span>! 👋
    </div>
</div>

<!-- ===== STATISTICS CARDS ===== -->
<div class="row g-4">

    <!-- Card: Jumlah Murid -->
    <div class="col-md-4 col-sm-6">
        <div class="dashboard-card card-murid">
            <div class="card-body text-center">
                <div class="icon-wrapper">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h5 class="card-title">Jumlah Murid</h5>
                <h1 class="card-number">{{ $totalMurid ?? 0 }}</h1>
                <p class="card-subtitle">
                    <i class="bi bi-arrow-up"></i> Murid terdaftar
                </p>
            </div>
        </div>
    </div>

    <!-- Card: Data Penilaian -->
    <div class="col-md-4 col-sm-6">
        <div class="dashboard-card card-penilaian">
            <div class="card-body text-center">
                <div class="icon-wrapper">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h5 class="card-title">Data Penilaian</h5>
                <h1 class="card-number">{{ $totalPenilaian ?? 0 }}</h1>
                <p class="card-subtitle">
                    <i class="bi bi-check-circle"></i> Penilaian tersimpan
                </p>
            </div>
        </div>
    </div>

    <!-- Card: Hasil Penilaian -->
    <div class="col-md-4 col-sm-6">
        <div class="dashboard-card card-hasil">
            <div class="card-body text-center">
                <div class="icon-wrapper">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h5 class="card-title">Hasil Penilaian</h5>
                <h1 class="card-number">{{ $totalHasil ?? 0 }}</h1>
                <p class="card-subtitle">
                    <i class="bi bi-trophy"></i> {{ $kategoriBSH ?? 0 }} kategori BSH
                </p>
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
            @forelse($recentPenilaians as $item)
                <div class="activity-card" style="border-left-color: #0984E3;">
                    <div class="activity-info">
                        <div class="activity-icon bg-primary">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <div>
                            <p class="activity-text">
                                Penilaian terbaru: <strong>{{ $item->murid->nama ?? 'Murid' }}</strong>
                                <small>Hasil fuzzy: {{ is_numeric($item->hasil_fuzzy) ? number_format((float) $item->hasil_fuzzy, 2) : ($item->hasil_fuzzy ?? '-') }} | Kategori: {{ $item->kategori ?? '-' }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="activity-time">
                        <i class="bi bi-clock"></i> {{ $item->created_at?->diffForHumans() ?? '-' }}
                    </div>
                </div>
            @empty
                <div class="activity-card" style="border-left-color: #A8E6CF;">
                    <div class="activity-info">
                        <div class="activity-icon" style="background: #E8F5E9; color: #27AE60;">
                            <i class="bi bi-inbox"></i>
                        </div>
                        <div>
                            <p class="activity-text">
                                Belum ada penilaian terbaru
                                <small>Tambahkan penilaian untuk melihat aktivitas di sini.</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection