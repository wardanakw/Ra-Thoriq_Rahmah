@extends('layouts.app')

@section('content')

<style>
    /* ============================
           DETAIL MURID STYLE
        ============================ */
    
    /* Page Header */
    .page-header {
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
        border-left: 5px solid #74B9FF;
    }

    .page-header h4 {
        color: #2C3E50;
        font-weight: 800;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-header h4 i {
        color: #0984E3;
        font-size: 28px;
    }

    .page-header .breadcrumb-custom {
        font-size: 14px;
        color: #7F8C8D;
    }

    .page-header .breadcrumb-custom a {
        color: #0984E3;
        text-decoration: none;
        font-weight: 600;
    }

    .page-header .breadcrumb-custom a:hover {
        text-decoration: underline;
    }

    /* ===== CARD ===== */
    .card-detail {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-detail .card-header {
        background: linear-gradient(135deg, #74B9FF, #0984E3) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-detail .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-detail .card-header h4 i {
        font-size: 24px;
        color: #FFE66D;
    }

    .card-detail .card-body {
        padding: 30px;
        background: #fff;
    }

    /* ===== PROFILE PHOTO ===== */
    .profile-photo-wrapper {
        text-align: center;
        padding: 20px;
        background: #FAFFFE;
        border-radius: 15px;
        border: 2px dashed #E8F5E9;
        min-height: 280px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .profile-photo {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #74B9FF;
        box-shadow: 0 5px 20px rgba(9, 132, 227, 0.2);
        transition: all 0.3s ease;
    }

    .profile-photo:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(9, 132, 227, 0.3);
    }

    .profile-photo-placeholder {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 72px;
        color: #27AE60;
        border: 5px solid #A8E6CF;
        margin: 0 auto;
    }

    .profile-name {
        margin-top: 15px;
        font-weight: 700;
        font-size: 18px;
        color: #2C3E50;
    }

    .profile-class {
        font-size: 14px;
        color: #7F8C8D;
        display: flex;
        align-items: center;
        gap: 6px;
        justify-content: center;
    }

    .profile-class .badge {
        background: #A8E6CF;
        color: #2C3E50;
        padding: 4px 14px;
        border-radius: 50px;
        font-weight: 600;
    }

    /* ===== INFO TABLE ===== */
    .info-table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .info-table tr {
        transition: all 0.3s ease;
    }

    .info-table tr:hover {
        transform: translateX(5px);
    }

    .info-table th {
        width: 180px;
        padding: 12px 18px;
        background: #F8F9FA;
        border: none;
        border-radius: 12px 0 0 12px;
        font-weight: 700;
        color: #2C3E50;
        font-size: 14px;
        white-space: nowrap;
    }

    .info-table th i {
        color: #0984E3;
        margin-right: 8px;
        width: 20px;
        text-align: center;
    }

    .info-table td {
        padding: 12px 18px;
        background: #FAFFFE;
        border: none;
        border-radius: 0 12px 12px 0;
        font-weight: 600;
        color: #2C3E50;
        font-size: 14px;
    }

    .info-table td .text-muted {
        color: #BDC3C7;
        font-weight: 400;
    }

    /* Badge JK */
    .badge-jk-detail {
        padding: 4px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 13px;
    }

    .badge-jk-detail.laki {
        background: #D4E6F1;
        color: #0984E3;
    }

    .badge-jk-detail.perempuan {
        background: #FDEBD0;
        color: #E67E22;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-action-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .btn-action-group .btn {
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action-group .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-action-group .btn i {
        font-size: 18px;
    }

    .btn-kembali {
        background: #F8F9FA;
        color: #4A4A4A;
        border: 2px solid #E8F5E9;
    }

    .btn-kembali:hover {
        background: #FFF5F5;
        border-color: #FF6B6B;
        color: #FF6B6B;
    }

    .btn-edit {
        background: linear-gradient(135deg, #FDCB6E, #F39C12);
        color: #fff;
        border: none;
        box-shadow: 0 3px 15px rgba(243, 156, 18, 0.3);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #F39C12, #E67E22);
        color: #fff;
    }

    .btn-penilaian {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        border: none;
        box-shadow: 0 3px 15px rgba(136, 216, 176, 0.3);
    }

    .btn-penilaian:hover {
        background: linear-gradient(135deg, #88D8B0, #6BCB9A);
        color: #fff;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .page-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h4 {
            font-size: 18px;
        }

        .card-detail .card-body {
            padding: 20px;
        }

        .profile-photo, .profile-photo-placeholder {
            width: 140px;
            height: 140px;
            font-size: 56px;
        }

        .info-table th {
            width: 140px;
            font-size: 13px;
            padding: 10px 14px;
        }

        .info-table td {
            font-size: 13px;
            padding: 10px 14px;
        }

        .btn-action-group .btn {
            padding: 8px 20px;
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .card-detail .card-body {
            padding: 15px;
        }

        .profile-photo-wrapper {
            min-height: 200px;
            padding: 15px;
        }

        .profile-photo, .profile-photo-placeholder {
            width: 120px;
            height: 120px;
            font-size: 48px;
        }

        .profile-name {
            font-size: 16px;
        }

        .info-table th {
            width: 100px;
            font-size: 12px;
            padding: 8px 12px;
        }

        .info-table td {
            font-size: 12px;
            padding: 8px 12px;
        }

        .btn-action-group {
            flex-direction: column;
        }

        .btn-action-group .btn {
            width: 100%;
            justify-content: center;
            padding: 10px 20px;
        }
    }

    @media (max-width: 576px) {
        .page-header h4 {
            font-size: 16px;
        }

        .profile-photo-wrapper {
            min-height: 160px;
            padding: 10px;
        }

        .profile-photo, .profile-photo-placeholder {
            width: 100px;
            height: 100px;
            font-size: 40px;
            border-width: 3px;
        }

        .profile-name {
            font-size: 14px;
        }

        .profile-class {
            font-size: 12px;
        }

        .info-table th {
            width: 80px;
            font-size: 11px;
            padding: 6px 10px;
            border-radius: 8px 0 0 8px;
        }

        .info-table td {
            font-size: 11px;
            padding: 6px 10px;
            border-radius: 0 8px 8px 0;
        }

        .info-table th i {
            margin-right: 4px;
            width: 16px;
        }

        .badge-jk-detail {
            font-size: 11px;
            padding: 3px 12px;
        }
    }
</style>


@php
    $dashboardRoute = auth()->check()
        ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('guru.dashboard'))
        : route('login');
@endphp
<div class="page-header">
    <h4>
        <i class="bi bi-person-plus-fill"></i>
        Tambah Data Murid
    </h4>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ $dashboardRoute }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('murid.index') }}">Data Murid</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #27AE60; font-weight: 600;">Tambah</span>
    </div>
</div>

<!-- ===== DETAIL CARD ===== -->
<div class="card card-detail shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-person-circle"></i>
            Profil Murid
        </h4>
    </div>

    <div class="card-body">
        <div class="row">

            <!-- ===== PHOTO ===== -->
            <div class="col-md-3">
                <div class="profile-photo-wrapper">
                    @if($murid->foto)
                        <img src="{{ asset('storage/'.$murid->foto) }}"
                             alt="Foto {{ $murid->nama }}"
                             class="profile-photo">
                    @else
                        <div class="profile-photo-placeholder">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                    <div class="profile-name">{{ $murid->nama }}</div>
                    <div class="profile-class">
                        <i class="bi bi-book"></i>
                        <span class="badge">{{ $murid->kelas }}</span>
                    </div>
                </div>
            </div>

            <!-- ===== INFO ===== -->
            <div class="col-md-9">
                <table class="table info-table">
                    <tr>
                        <th><i class="bi bi-hash"></i> NIS</th>
                        <td>{{ $murid->nis }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-person"></i> Nama</th>
                        <td>{{ $murid->nama }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</th>
                        <td>
                            <span class="badge-jk-detail {{ $murid->jenis_kelamin == 'Laki-laki' ? 'laki' : 'perempuan' }}">
                                {{ $murid->jenis_kelamin == 'Laki-laki' ? '' : '' }}
                                {{ $murid->jenis_kelamin }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-geo-alt"></i> Tempat Lahir</th>
                        <td>{{ $murid->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar3"></i> Tanggal Lahir</th>
                        <td>
                            {{ \Carbon\Carbon::parse($murid->tanggal_lahir)->isoFormat('D MMMM Y') }}
                            <span class="text-muted">
                                ({{ \Carbon\Carbon::parse($murid->tanggal_lahir)->age }} tahun)
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-book"></i> Kelas</th>
                        <td>
                            <span class="badge" style="background: #A8E6CF; color: #2C3E50; padding: 4px 14px; border-radius: 50px; font-weight: 600;">
                                <i class="bi bi-mortarboard"></i> {{ $murid->kelas }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-people"></i> Nama Orang Tua</th>
                        <td>
                            <i class="bi bi-person" style="color: #27AE60;"></i>
                            {{ $murid->nama_orangtua }}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-house"></i> Alamat</th>
                        <td>{{ $murid->alamat }}</td>
                    </tr>
                </table>

                <!-- ===== ACTION BUTTONS ===== -->
                <div class="btn-action-group">
                    <a href="{{ route('murid.index') }}" class="btn btn-kembali">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="{{ route('murid.edit', $murid->id) }}" class="btn btn-edit">
                        <i class="bi bi-pencil-square"></i>
                        Edit Data
                    </a>
                    <a href="{{ route('penilaian.create', ['murid_id' => $murid->id]) }}" class="btn btn-penilaian">
                        <i class="bi bi-clipboard-plus"></i>
                        Buat Penilaian
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection