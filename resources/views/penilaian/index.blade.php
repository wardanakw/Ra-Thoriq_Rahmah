@extends('layouts.app')

@section('content')

<style>
    /* Warna Ceria untuk TK */
    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.12);
        animation: fadeInUp 0.5s ease;
    }

    .card-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 50%, #FFB3B3 100%);
        padding: 20px 30px;
        border-bottom: 4px solid #FFE66D;
    }

    .card-header h4 {
        color: white;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        margin: 0;
        font-size: 22px;
    }

    .card-header h4 i {
        margin-right: 10px;
        color: #FFE66D;
    }

    .btn-tambah {
        background: white;
        color: #FF6B6B;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        background: #FFF8F0;
        color: #FF5252;
    }

    .btn-tambah i {
        margin-right: 8px;
    }

    .card-body {
        background: #FFF8F0;
        padding: 25px;
    }

    /* Alert Styling */
    .alert-success {
        background: linear-gradient(135deg, #A8E6CF 0%, #88D8B0 100%);
        border: none;
        border-radius: 15px;
        color: #2C3E50;
        font-weight: 600;
        padding: 15px 20px;
        box-shadow: 0 3px 15px rgba(136, 216, 176, 0.3);
        animation: slideDown 0.5s ease;
    }

    .alert-success i {
        margin-right: 10px;
    }

    /* Table Styling */
    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    .table {
        margin-bottom: 0;
        background: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background: linear-gradient(135deg, #A8E6CF 0%, #88D8B0 100%);
    }

    .table thead th {
        padding: 15px 12px;
        border: none;
        font-weight: 700;
        font-size: 14px;
        color: #2C3E50;
        text-align: center;
        vertical-align: middle;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .table thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .table thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .table tbody tr:hover {
        background-color: #FFF5F5;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.08);
    }

    .table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
        font-size: 14px;
        color: #4A4A4A;
        border: none;
        text-align: center;
    }

    .table tbody td:first-child {
        font-weight: 700;
        color: #FF6B6B;
        font-size: 16px;
    }

    .table tbody td:not(:first-child):not(:nth-child(2)) {
        text-align: center;
    }

    /* Nama Murid - lebih menonjol */
    .nama-murid {
        font-weight: 600;
        color: #2C3E50;
        font-size: 15px;
    }

    .nama-murid i {
        color: #FF6B6B;
        margin-right: 8px;
        font-size: 16px;
    }

    /* Badge Kategori */
    .badge {
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .badge:hover {
        transform: scale(1.05);
    }

    .badge-bb {
        background: #FFE5E5;
        color: #D63031;
        border: 2px solid #FF7675;
    }

    .badge-mb {
        background: #FFF3CD;
        color: #F39C12;
        border: 2px solid #FDCB6E;
    }

    .badge-bsh {
        background: #D4EDDA;
        color: #27AE60;
        border: 2px solid #6DD5A0;
    }

    .badge-bsb {
        background: #C3E6CB;
        color: #1E8449;
        border: 2px solid #58D68D;
    }

    .badge-belum {
        background: #EAECEE;
        color: #7F8C8D;
        border: 2px solid #BDC3C7;
    }

    /* Nilai dengan format yang menarik */
    .nilai-angka {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        background: #F8F9FA;
        font-weight: 600;
        font-size: 14px;
        color: #2C3E50;
        min-width: 50px;
    }

    .nilai-agama {
        background: #FFF3E0;
        color: #E67E22;
    }

    .nilai-jati {
        background: #E8F5E9;
        color: #27AE60;
    }

    .nilai-literasi {
        background: #E3F2FD;
        color: #2980B9;
    }

    .nilai-fuzzy {
        background: #F3E5F5;
        color: #8E44AD;
    }

    /* Action Buttons */
    .btn-action {
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 3px;
        border: none;
    }

    .btn-action i {
        margin-right: 5px;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .btn-detail {
        background: #3498DB;
        color: white;
    }

    .btn-detail:hover {
        background: #2980B9;
        color: white;
    }

    .btn-edit {
        background: #F39C12;
        color: white;
    }

    .btn-edit:hover {
        background: #E67E22;
        color: white;
    }

    .btn-hapus {
        background: #E74C3C;
        color: white;
    }

    .btn-hapus:hover {
        background: #C0392B;
        color: white;
    }

    /* Pagination Styling */
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-link {
        border: none;
        color: #FF6B6B;
        font-weight: 600;
        padding: 8px 16px;
        margin: 0 3px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: #FF6B6B;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }

    .pagination .active .page-link {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
        color: white;
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }

    /* Empty State */
    .empty-state {
        padding: 40px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 60px;
        color: #FFD93D;
        margin-bottom: 20px;
        display: block;
    }

    .empty-state h5 {
        color: #4A4A4A;
        font-weight: 600;
    }

    .empty-state p {
        color: #7F8C8D;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: stretch !important;
        }

        .card-header h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }

        .card-body {
            padding: 15px;
        }

        .table thead th {
            font-size: 11px;
            padding: 10px 8px;
        }

        .table tbody td {
            font-size: 12px;
            padding: 10px 8px;
        }

        .btn-action {
            padding: 4px 10px;
            font-size: 11px;
        }

        .badge {
            padding: 4px 10px;
            font-size: 11px;
        }

        .nama-murid {
            font-size: 13px;
        }

        /* Tombol aksi di mobile dibuat vertikal */
        .aksi-mobile {
            display: flex;
            flex-direction: column;
            gap: 5px;
            align-items: center;
        }

        .aksi-mobile .btn-action {
            width: 100%;
        }
    }

    /* Tooltip untuk kategori */
    .tooltip-kategori {
        position: relative;
        cursor: help;
    }

    .tooltip-kategori:hover::after {
        content: attr(data-tip);
        position: absolute;
        background: #2C3E50;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 12px;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
        z-index: 100;
    }

    /* Statistik ringkas di atas tabel */
    .stats-bar {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 20px;
        padding: 15px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .stats-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #4A4A4A;
    }

    .stats-item .badge {
        font-size: 16px;
        padding: 5px 15px;
    }

    .stats-item i {
        font-size: 20px;
        color: #FF6B6B;
    }
</style>

<div class="container-fluid py-3">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h4>
                    <i class="bi bi-clipboard-data"></i>
                    Data Penilaian Perkembangan Anak
                    <small style="font-size: 14px; opacity: 0.9; display: block; margin-top: 5px; font-weight: 400;">
                        <i class="bi bi-heart-fill" style="color: #FFE66D;"></i> 
                             RA Thoriqur Rahmah
                    </small>
                </h4>

                <a href="{{ route('penilaian.create') }}" class="btn btn-tambah">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Penilaian
                </a>
            </div>
        </div>

        <div class="card-body">

            <!-- Statistik Ringkas -->
            @php
                $totalData = $penilaian->count();
                $totalBB = $penilaian->where('kategori', 'BB')->count();
                $totalMB = $penilaian->where('kategori', 'MB')->count();
                $totalBSH = $penilaian->where('kategori', 'BSH')->count();
                $totalBSB = $penilaian->where('kategori', 'BSB')->count();
            @endphp

            @if($totalData > 0)
                <div class="stats-bar">
                    <div class="stats-item">
                        <i class="bi bi-people-fill"></i>
                        <span>Total: <strong>{{ $totalData }}</strong> Murid</span>
                    </div>
                    @if($totalBB > 0)
                        <div class="stats-item">
                            <span class="badge badge-bb">BB</span>
                            <span>{{ $totalBB }}</span>
                        </div>
                    @endif
                    @if($totalMB > 0)
                        <div class="stats-item">
                            <span class="badge badge-mb">MB</span>
                            <span>{{ $totalMB }}</span>
                        </div>
                    @endif
                    @if($totalBSH > 0)
                        <div class="stats-item">
                            <span class="badge badge-bsh">BSH</span>
                            <span>{{ $totalBSH }}</span>
                        </div>
                    @endif
                    @if($totalBSB > 0)
                        <div class="stats-item">
                            <span class="badge badge-bsb">BSB</span>
                            <span>{{ $totalBSB }}</span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Murid</th>
                            <th width="130">Tanggal</th>
                            <th width="120">Agama</th>
                            <th width="120">Jati Diri</th>
                            <th width="120">Literasi</th>
                            <th width="120">Fuzzy</th>
                            <th width="160">Kategori</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($penilaian as $item)
                        <tr>
                            <td>
                                <span style="display: inline-block; width: 30px; height: 30px; background: #FFF0F0; border-radius: 50%; line-height: 30px; color: #FF6B6B; font-weight: 700;">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="text-start">
                                <span class="nama-murid">
                                    <i class="bi bi-person-circle"></i>
                                    {{ $item->murid->nama }}
                                </span>
                            </td>
                            <td>
                                <i class="bi bi-calendar3" style="color: #FF6B6B; margin-right: 5px;"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                            </td>
                            <td>
                                <span class="nilai-angka nilai-agama">
                                    {{ number_format($item->agama,2) }}
                                </span>
                            </td>
                            <td>
                                <span class="nilai-angka nilai-jati">
                                    {{ number_format($item->jati_diri,2) }}
                                </span>
                            </td>
                            <td>
                                <span class="nilai-angka nilai-literasi">
                                    {{ number_format($item->literasi,2) }}
                                </span>
                            </td>
                            <td>
                                @if($item->hasil_fuzzy)
                                    <span class="nilai-angka nilai-fuzzy">
                                        {{ number_format($item->hasil_fuzzy,2) }}
                                    </span>
                                @else
                                    <span style="color: #BDC3C7;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($item->kategori)
                                    @php
                                        $classBadge = 'badge-belum';
                                        if($item->kategori == 'BB') $classBadge = 'badge-bb';
                                        elseif($item->kategori == 'MB') $classBadge = 'badge-mb';
                                        elseif($item->kategori == 'BSH') $classBadge = 'badge-bsh';
                                        elseif($item->kategori == 'BSB') $classBadge = 'badge-bsb';
                                    @endphp
                                    <span class="badge {{ $classBadge }}">
                                        {{ $item->kategori }}
                                    </span>
                                @else
                                    <span class="badge badge-belum">
                                        <i class="bi bi-clock-history"></i>
                                        Belum Diproses
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <a href="{{ route('penilaian.show', $item->id) }}"
                                        class="btn btn-action btn-detail">
                                        <i class="bi bi-eye"></i>
                                        Detail
                                    </a>
                                    <a href="{{ route('penilaian.edit', $item->id) }}"
                                        class="btn btn-action btn-edit">
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('penilaian.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-action btn-hapus"
                                            onclick="return confirm('Yakin ingin menghapus data penilaian ini?')">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5>Belum Ada Data Penilaian</h5>
                                    <p class="text-muted">Klik tombol "Tambah Penilaian" untuk mulai menilai perkembangan anak.</p>
                                    <a href="{{ route('penilaian.create') }}" class="btn btn-tambah" style="display: inline-block; width: auto; margin-top: 10px;">
                                        <i class="bi bi-plus-circle"></i>
                                        Tambah Penilaian Sekarang
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

            @if($penilaian->hasPages())
                <div class="mt-3">
                    {{ $penilaian->links() }}
                </div>
            @endif

            <!-- Footer info -->
            <div class="mt-3 text-center text-muted" style="font-size: 13px;">
                <i class="bi bi-info-circle"></i>
                Keterangan: BB (Belum Berkembang) | MB (Mulai Berkembang) | BSH (Berkembang Sesuai Harapan) | BSB (Berkembang Sangat Baik)
            </div>

        </div>

    </div>

</div>
@endsection