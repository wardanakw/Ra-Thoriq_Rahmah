@extends('layouts.app')

@section('content')

<style>
    /* ============================
           LAPORAN PENILAIAN STYLE
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
        border-left: 5px solid #E74C3C;
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
        color: #E74C3C;
        font-size: 28px;
    }

    .page-header .header-sub {
        font-size: 14px;
        color: #7F8C8D;
        font-weight: 600;
    }

    .page-header .header-sub span {
        color: #E74C3C;
        font-weight: 700;
    }

    /* ===== CARD ===== */
    .card-laporan {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-laporan .card-header {
        background: linear-gradient(135deg, #FF6B6B, #E74C3C) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-laporan .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-laporan .card-header h4 i {
        font-size: 24px;
        color: #FFE66D;
    }

    .card-laporan .card-body {
        padding: 25px;
        background: #fff;
    }

    /* ===== FILTER FORM ===== */
    .filter-section {
        background: #F8F9FA;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .filter-section .form-group {
        margin-bottom: 0;
    }

    .filter-section label {
        font-weight: 700;
        color: #2C3E50;
        font-size: 13px;
        margin-bottom: 4px;
        display: block;
    }

    .filter-section label i {
        color: #E74C3C;
        margin-right: 4px;
    }

    .filter-section .form-control,
    .filter-section .form-select {
        border: 2px solid #F0F0F0;
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 13px;
        transition: all 0.3s ease;
        background: #fff;
    }

    .filter-section .form-control:focus,
    .filter-section .form-select:focus {
        border-color: #E74C3C;
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.15);
        outline: none;
    }

    .filter-section .form-control:hover,
    .filter-section .form-select:hover {
        border-color: #FF6B6B;
    }

    .btn-filter {
        background: linear-gradient(135deg, #FF6B6B, #E74C3C);
        color: #fff;
        border: none;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 13px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 2px;
    }

    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(231, 76, 60, 0.35);
        background: linear-gradient(135deg, #E74C3C, #C0392B);
        color: #fff;
    }

    .btn-pdf {
        background: linear-gradient(135deg, #E74C3C, #C0392B);
        color: #fff;
        border: none;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 13px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        margin-top: 2px;
    }

    .btn-pdf:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(231, 76, 60, 0.35);
        background: linear-gradient(135deg, #C0392B, #A93226);
        color: #fff;
    }

    .btn-reset {
        background: #F8F9FA;
        color: #4A4A4A;
        border: 2px solid #F0F0F0;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 13px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        margin-top: 2px;
    }

    .btn-reset:hover {
        background: #FFF5F5;
        border-color: #FF6B6B;
        color: #E74C3C;
    }

    /* ===== STATISTIK ===== */
    .stats-laporan {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 20px;
        padding: 15px 20px;
        background: #FFF5F5;
        border-radius: 12px;
        border-left: 4px solid #E74C3C;
    }

    .stats-laporan .stat-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #2C3E50;
    }

    .stats-laporan .stat-item i {
        color: #E74C3C;
    }

    .stats-laporan .stat-item .badge {
        font-size: 14px;
        padding: 4px 12px;
    }

    /* ===== TABLE ===== */
    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    .table-laporan {
        margin-bottom: 0;
        background: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-laporan thead {
        background: linear-gradient(135deg, #FFF0F0, #FDE0E0);
    }

    .table-laporan thead th {
        padding: 12px 10px;
        border: none;
        font-weight: 700;
        font-size: 12px;
        color: #2C3E50;
        text-align: center;
        vertical-align: middle;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .table-laporan thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .table-laporan thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .table-laporan tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #F0F0F0;
    }

    .table-laporan tbody tr:hover {
        background: #FFF5F5;
        transform: scale(1.01);
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.05);
    }

    .table-laporan tbody td {
        padding: 10px 10px;
        vertical-align: middle;
        font-size: 13px;
        color: #4A4A4A;
        border: none;
        text-align: center;
    }

    .table-laporan tbody td:first-child {
        font-weight: 700;
        color: #E74C3C;
        font-size: 14px;
    }

    .table-laporan tbody td:nth-child(2) {
        text-align: left;
        font-weight: 600;
        color: #2C3E50;
    }

    /* ===== BADGE KATEGORI ===== */
    .badge-kategori {
        padding: 4px 14px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 12px;
    }

    .badge-kategori.bb {
        background: #FFE5E5;
        color: #D63031;
        border: 1px solid #FF7675;
    }

    .badge-kategori.mb {
        background: #FFF3CD;
        color: #F39C12;
        border: 1px solid #FDCB6E;
    }

    .badge-kategori.bsh {
        background: #D4EDDA;
        color: #27AE60;
        border: 1px solid #6DD5A0;
    }

    .badge-kategori.bsb {
        background: #C3E6CB;
        color: #1E8449;
        border: 1px solid #58D68D;
    }

    .badge-kategori.belum {
        background: #EAECEE;
        color: #7F8C8D;
        border: 1px solid #BDC3C7;
    }

    /* ===== NILAI ===== */
    .nilai-angka {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        background: #F8F9FA;
        color: #2C3E50;
        min-width: 45px;
    }

    /* ===== PAGINATION ===== */
    .pagination-custom {
        margin-top: 20px;
    }

    .pagination-custom .pagination {
        justify-content: center;
        margin: 0;
        gap: 5px;
    }

    .pagination-custom .page-link {
        border: none;
        color: #E74C3C;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 50px;
        transition: all 0.3s ease;
        background: #F8F5F5;
    }

    .pagination-custom .page-link:hover {
        background: linear-gradient(135deg, #FF6B6B, #E74C3C);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }

    .pagination-custom .active .page-link {
        background: linear-gradient(135deg, #FF6B6B, #E74C3C);
        color: #fff;
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        padding: 40px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 56px;
        color: #F0C0C0;
        margin-bottom: 15px;
        display: block;
    }

    .empty-state h5 {
        color: #2C3E50;
        font-weight: 700;
    }

    .empty-state p {
        color: #7F8C8D;
        max-width: 400px;
        margin: 10px auto;
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

        .card-laporan .card-body {
            padding: 20px;
        }

        .filter-section {
            padding: 15px;
        }

        .filter-section .form-group {
            margin-bottom: 12px;
        }

        .table-laporan thead th {
            font-size: 10px;
            padding: 8px 6px;
        }

        .table-laporan tbody td {
            font-size: 12px;
            padding: 8px 6px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-filter, .btn-pdf, .btn-reset {
            width: 100%;
            justify-content: center;
            margin-top: 8px;
        }

        .filter-section .col-md-2 {
            margin-top: 5px;
        }

        .stats-laporan {
            flex-direction: column;
            gap: 8px;
        }

        .table-laporan tbody td {
            font-size: 11px;
            padding: 6px 4px;
        }

        .table-laporan thead th {
            font-size: 9px;
            padding: 6px 4px;
        }

        .badge-kategori {
            font-size: 10px;
            padding: 3px 10px;
        }

        .nilai-angka {
            font-size: 11px;
            padding: 2px 8px;
            min-width: 35px;
        }
    }

    @media (max-width: 576px) {
        .card-laporan .card-body {
            padding: 15px;
        }

        .page-header h4 {
            font-size: 16px;
        }

        .table-laporan thead th {
            font-size: 8px;
            padding: 4px 3px;
            letter-spacing: 0;
        }

        .table-laporan tbody td {
            font-size: 10px;
            padding: 4px 3px;
        }

        .badge-kategori {
            font-size: 9px;
            padding: 2px 8px;
        }

        .nilai-angka {
            font-size: 10px;
            padding: 1px 6px;
            min-width: 30px;
        }

        .stats-laporan .stat-item {
            font-size: 12px;
        }

        .stats-laporan .stat-item .badge {
            font-size: 12px;
            padding: 2px 10px;
        }
    }
</style>

<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <div>
        <h4>
            <i class="bi bi-file-earmark-text"></i>
            Laporan Penilaian Perkembangan Anak
        </h4>
        <div class="header-sub">
            <i class="bi bi-calendar3"></i>
            Periode: 
            @if(request('tanggal_awal') && request('tanggal_akhir'))
                {{ \Carbon\Carbon::parse(request('tanggal_awal'))->isoFormat('D MMM Y') }} - 
                {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->isoFormat('D MMM Y') }}
            @else
                <span>Semua Data</span>
            @endif
        </div>
    </div>
    <div>
        <span class="badge" style="background: #E74C3C; color: #fff; padding: 8px 18px; font-size: 14px;">
            <i class="bi bi-file-earmark-text"></i>
            Total: {{ $laporan->total() }} data
        </span>
    </div>
</div>

<!-- ===== CARD LAPORAN ===== -->
<div class="card card-laporan shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-funnel"></i>
            Filter Laporan
        </h4>
    </div>

    <div class="card-body">

        <!-- ===== FILTER FORM ===== -->
        <div class="filter-section">
            <form method="GET" id="formFilter">
                <div class="row g-3">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label>
                                <i class="bi bi-calendar-start"></i>
                                Tanggal Awal
                            </label>
                            <input type="date"
                                   name="tanggal_awal"
                                   class="form-control"
                                   value="{{ request('tanggal_awal') }}">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label>
                                <i class="bi bi-calendar-end"></i>
                                Tanggal Akhir
                            </label>
                            <input type="date"
                                   name="tanggal_akhir"
                                   class="form-control"
                                   value="{{ request('tanggal_akhir') }}">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label>
                                <i class="bi bi-book"></i>
                                Kelas
                            </label>
                            <select name="kelas" class="form-select">
                                <option value="">Semua Kelas</option>
                                <option value="A" {{ request('kelas') == 'A' ? 'selected' : '' }}>Kelas A</option>
                                <option value="B" {{ request('kelas') == 'B' ? 'selected' : '' }}>Kelas B</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <div class="form-group">
                            <label>
                                <i class="bi bi-trophy"></i>
                                Kategori
                            </label>
                            <select name="kategori" class="form-select">
                                <option value="">Semua Kategori</option>
                                <option value="BB" {{ request('kategori') == 'BB' ? 'selected' : '' }}>BB</option>
                                <option value="MB" {{ request('kategori') == 'MB' ? 'selected' : '' }}>MB</option>
                                <option value="BSH" {{ request('kategori') == 'BSH' ? 'selected' : '' }}>BSH</option>
                                <option value="BSB" {{ request('kategori') == 'BSB' ? 'selected' : '' }}>BSB</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="submit" class="btn-filter">
                                    <i class="bi bi-search"></i>
                                    Filter
                                </button>
                                <a href="{{ route('laporan.pdf', request()->all()) }}" class="btn-pdf">
                                    <i class="bi bi-file-pdf"></i>
                                    PDF
                                </a>
                                <a href="{{ route('laporan.index') }}" class="btn-reset">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- ===== STATISTIK ===== -->
        @php
            $totalData = $laporan->total();
            $totalBB = $laporan->where('kategori', 'BB')->count();
            $totalMB = $laporan->where('kategori', 'MB')->count();
            $totalBSH = $laporan->where('kategori', 'BSH')->count();
            $totalBSB = $laporan->where('kategori', 'BSB')->count();
        @endphp

        @if($totalData > 0)
        <div class="stats-laporan">
            <div class="stat-item">
                <i class="bi bi-people-fill"></i>
                Total Data: <strong>{{ $totalData }}</strong>
            </div>
            @if($totalBB > 0)
            <div class="stat-item">
                <span class="badge badge-kategori bb">BB</span>
                {{ $totalBB }}
            </div>
            @endif
            @if($totalMB > 0)
            <div class="stat-item">
                <span class="badge badge-kategori mb">MB</span>
                {{ $totalMB }}
            </div>
            @endif
            @if($totalBSH > 0)
            <div class="stat-item">
                <span class="badge badge-kategori bsh">BSH</span>
                {{ $totalBSH }}
            </div>
            @endif
            @if($totalBSB > 0)
            <div class="stat-item">
                <span class="badge badge-kategori bsb">BSB</span>
                {{ $totalBSB }}
            </div>
            @endif
        </div>
        @endif

        <!-- ===== TABLE ===== -->
        <div class="table-responsive">
            <table class="table table-laporan">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Anak</th>
                        <th width="80">Kelas</th>
                        <th width="110">Tanggal</th>
                        <th width="80">Agama</th>
                        <th width="80">Jati Diri</th>
                        <th width="80">Literasi</th>
                        <th width="90">Hasil Fuzzy</th>
                        <th width="100">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $item)
                    <tr>
                        <td>{{ ($laporan->firstItem() ?? 0) + $loop->index }}</td>
                        <td>
                            <i class="bi bi-person-circle" style="color: #E74C3C; margin-right: 6px;"></i>
                            {{ $item->murid->nama }}
                        </td>
                        <td>
                            <span class="badge" style="background: #FFF0F0; color: #E74C3C; font-weight: 600; padding: 4px 12px;">
                                {{ $item->murid->kelas }}
                            </span>
                        </td>
                        <td>
                            <i class="bi bi-calendar3" style="color: #E74C3C; margin-right: 4px;"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD/MM/YYYY') }}
                        </td>
                        <td>
                            <span class="nilai-angka">
                                {{ is_numeric($item->agama) ? number_format((float) $item->agama, 2) : '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="nilai-angka">
                                {{ is_numeric($item->jati_diri) ? number_format((float) $item->jati_diri, 2) : '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="nilai-angka">
                                {{ is_numeric($item->steam ?? $item->literasi ?? null) ? number_format((float) ($item->steam ?? $item->literasi), 2) : '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="nilai-angka" style="background: #FFF0F0; color: #E74C3C; font-weight: 700;">
                                {{ is_numeric($item->hasil_fuzzy) ? number_format((float) $item->hasil_fuzzy, 2) : ($item->hasil_fuzzy ?? '-') }}
                            </span>
                        </td>
                        <td>
                            @php
                                $kategori = $item->kategori ?? 'Belum';
                                $classKategori = 'belum';
                                if($kategori == 'BB') $classKategori = 'bb';
                                elseif($kategori == 'MB') $classKategori = 'mb';
                                elseif($kategori == 'BSH') $classKategori = 'bsh';
                                elseif($kategori == 'BSB') $classKategori = 'bsb';
                            @endphp
                            <span class="badge-kategori {{ $classKategori }}">
                                {{ $kategori }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="bi bi-file-earmark-text"></i>
                                <h5>Belum Ada Data Laporan</h5>
                                <p>Silakan lakukan penilaian terlebih dahulu atau ubah filter pencarian.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ===== PAGINATION ===== -->
        @if($laporan->hasPages())
        <div class="pagination-custom">
            {{ $laporan->appends(request()->query())->links() }}
        </div>
        @endif

        <!-- ===== INFO ===== -->
        @if($laporan->total() > 0)
        <div class="mt-3 text-center text-muted" style="font-size: 13px;">
            <i class="bi bi-info-circle"></i>
            Menampilkan {{ $laporan->firstItem() ?? 0 }} - {{ $laporan->lastItem() ?? 0 }} dari {{ $laporan->total() }} data
            @if(request('tanggal_awal') && request('tanggal_akhir'))
                <span>| Periode: {{ \Carbon\Carbon::parse(request('tanggal_awal'))->isoFormat('D MMM Y') }} - {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->isoFormat('D MMM Y') }}</span>
            @endif
        </div>
        @endif

    </div>
</div>

<!-- ===== SCRIPT ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto submit filter jika ada perubahan pada select
        const selects = document.querySelectorAll('select[name="kelas"], select[name="kategori"]');
        selects.forEach(function(select) {
            select.addEventListener('change', function() {
                document.getElementById('formFilter').submit();
            });
        });

        // Tombol reset
        const resetBtn = document.querySelector('.btn-reset');
        if (resetBtn) {
            resetBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = this.getAttribute('href');
            });
        }
    });
</script>

@endsection