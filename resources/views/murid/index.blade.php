@extends('layouts.app')

@section('content')

<style>
    /* ============================
           DATA MURID STYLE
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
        border-left: 5px solid #A8E6CF;
    }

    .page-header h3 {
        color: #2C3E50;
        font-weight: 800;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-header h3 i {
        color: #27AE60;
        font-size: 28px;
    }

    .page-header .header-sub {
        font-size: 14px;
        color: #7F8C8D;
        font-weight: 600;
        margin-top: 2px;
    }

    .page-header .header-sub span {
        color: #27AE60;
        font-weight: 700;
    }

    /* Button Tambah */
    .btn-tambah {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 3px 15px rgba(136, 216, 176, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 25px rgba(136, 216, 176, 0.4);
        background: linear-gradient(135deg, #88D8B0, #6BCB9A);
        color: #fff;
    }

    .btn-tambah i {
        font-size: 18px;
    }

    /* Alert */
    .alert-custom {
        border: none;
        border-radius: 15px;
        padding: 15px 20px;
        box-shadow: 0 3px 15px rgba(136, 216, 176, 0.2);
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #2C3E50;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideDown 0.5s ease;
    }

    .alert-custom i {
        font-size: 24px;
        color: #fff;
    }

    .alert-custom .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.7;
    }

    .alert-custom .btn-close:hover {
        opacity: 1;
    }

    /* ===== CARD ===== */
    .card-data {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-data .card-body {
        padding: 25px;
        background: #fff;
    }

    /* ===== TABLE ===== */
    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    .table-data {
        margin-bottom: 0;
        background: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-data thead {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
    }

    .table-data thead th {
        padding: 14px 12px;
        border: none;
        font-weight: 700;
        font-size: 13px;
        color: #2C3E50;
        text-align: center;
        vertical-align: middle;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .table-data thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .table-data thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .table-data tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #F0F0F0;
    }

    .table-data tbody tr:hover {
        background: #FFF5F5;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.05);
    }

    .table-data tbody td {
        padding: 12px 12px;
        vertical-align: middle;
        font-size: 14px;
        color: #4A4A4A;
        border: none;
        text-align: center;
    }

    .table-data tbody td:first-child {
        font-weight: 700;
        color: #27AE60;
        font-size: 16px;
    }

    /* Foto Murid */
    .foto-murid {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #A8E6CF;
        transition: all 0.3s ease;
    }

    .foto-murid:hover {
        transform: scale(1.2);
        border-color: #FF6B6B;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .foto-placeholder {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #27AE60;
        border: 3px solid #A8E6CF;
    }

    /* Nama Murid */
    .nama-murid {
        font-weight: 700;
        color: #2C3E50;
    }

    /* Badge Kelas */
    .badge-kelas {
        background: #E8F5E9;
        color: #27AE60;
        padding: 4px 14px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 12px;
        border: 1px solid #A8E6CF;
    }

    .badge-jk {
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 12px;
    }

    .badge-jk.laki {
        background: #D4E6F1;
        color: #0984E3;
        border: 1px solid #74B9FF;
    }

    .badge-jk.perempuan {
        background: #FDEBD0;
        color: #E67E22;
        border: 1px solid #FDCB6E;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-action {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 2px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .btn-action i {
        font-size: 14px;
    }

    .btn-detail {
        background: #3498DB;
        color: #fff;
    }

    .btn-detail:hover {
        background: #2980B9;
        color: #fff;
    }

    .btn-edit {
        background: #F39C12;
        color: #fff;
    }

    .btn-edit:hover {
        background: #E67E22;
        color: #fff;
    }

    .btn-hapus {
        background: #E74C3C;
        color: #fff;
    }

    .btn-hapus:hover {
        background: #C0392B;
        color: #fff;
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
        color: #27AE60;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 50px;
        transition: all 0.3s ease;
        background: #F8F9FA;
    }

    .pagination-custom .page-link:hover {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(136, 216, 176, 0.3);
    }

    .pagination-custom .active .page-link {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        box-shadow: 0 5px 15px rgba(136, 216, 176, 0.3);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        padding: 50px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 64px;
        color: #A8E6CF;
        margin-bottom: 20px;
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

    /* ===== ANIMATIONS ===== */
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

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .page-header {
            padding: 15px 20px;
        }

        .page-header h3 {
            font-size: 20px;
        }

        .table-data thead th {
            font-size: 11px;
            padding: 10px 8px;
        }

        .table-data tbody td {
            font-size: 12px;
            padding: 10px 8px;
        }

        .btn-action {
            padding: 4px 10px;
            font-size: 11px;
        }

        .btn-action i {
            font-size: 12px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }

        .page-header .text-end {
            text-align: center !important;
        }

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }

        .table-data tbody td {
            font-size: 11px;
            padding: 8px 6px;
        }

        .foto-murid, .foto-placeholder {
            width: 40px;
            height: 40px;
        }

        .badge-kelas, .badge-jk {
            font-size: 10px;
            padding: 2px 10px;
        }
    }

    @media (max-width: 576px) {
        .card-data .card-body {
            padding: 15px;
        }

        .table-data thead th {
            font-size: 10px;
            padding: 8px 4px;
        }

        .table-data tbody td {
            font-size: 10px;
            padding: 6px 4px;
        }

        .btn-action {
            padding: 3px 8px;
            font-size: 10px;
            margin: 1px;
        }

        .btn-action i {
            font-size: 10px;
        }

        .foto-murid, .foto-placeholder {
            width: 32px;
            height: 32px;
            font-size: 16px;
        }
    }
</style>

<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <div>
        <h3>
            <i class="bi bi-people-fill"></i>
            Data Murid
        </h3>
        <div class="header-sub">
            <i class="bi bi-mortarboard"></i>
            Total: <span>{{ $murid->total() }}</span> murid terdaftar
        </div>
    </div>
    <div>
        <a href="{{ route('murid.create') }}" class="btn btn-tambah">
            <i class="bi bi-plus-circle"></i>
            Tambah Murid
        </a>
    </div>
</div>

<!-- ===== ALERT ===== -->
@if(session('success'))
<div class="alert alert-custom alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- ===== CARD DATA ===== -->
<div class="card card-data shadow">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-data">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="80">Foto</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th width="60">JK</th>
                        <th>Kelas</th>
                        <th>Orang Tua</th>
                        <th width="230">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($murid as $item)
                    <tr>
                        <td>{{ ($murid->firstItem() ?? 0) + $loop->index }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/'.$item->foto) }}"
                                     alt="Foto {{ $item->nama }}"
                                     class="foto-murid">
                            @else
                                <span class="foto-placeholder">
                                    <i class="bi bi-person"></i>
                                </span>
                            @endif
                        </td>
                        <td>
                            <span style="font-weight: 600; color: #27AE60;">
                                {{ $item->nis }}
                            </span>
                        </td>
                        <td class="text-start">
                            <span class="nama-murid">{{ $item->nama }}</span>
                        </td>
                        <td>
                            <span class="badge-jk {{ $item->jenis_kelamin == 'Laki-laki' ? 'laki' : 'perempuan' }}">
                                {{ $item->jenis_kelamin == 'Laki-laki' ? '' : '' }}
                                {{ $item->jenis_kelamin }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-kelas">
                                <i class="bi bi-book"></i>
                                {{ $item->kelas }}
                            </span>
                        </td>
                        <td>
                            <i class="bi bi-person" style="color: #27AE60;"></i>
                            {{ $item->nama_orangtua }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                <a href="{{ route('murid.show', $item->id) }}"
                                   class="btn btn-action btn-detail"
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('murid.edit', $item->id) }}"
                                   class="btn btn-action btn-edit"
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('murid.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data murid {{ $item->nama }}?')"
                                            class="btn btn-action btn-hapus"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>Belum Ada Data Murid</h5>
                                <p>Klik tombol "Tambah Murid" untuk mulai mendaftarkan murid baru.</p>
                                <a href="{{ route('murid.create') }}" class="btn btn-tambah" style="margin-top: 15px;">
                                    <i class="bi bi-plus-circle"></i>
                                    Tambah Murid Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ===== PAGINATION ===== -->
        @if($murid->hasPages())
        <div class="pagination-custom">
            {{ $murid->links() }}
        </div>
        @endif

        <!-- ===== INFO ===== -->
        <div class="mt-3 text-center text-muted" style="font-size: 13px;">
            <i class="bi bi-info-circle"></i>
            Menampilkan {{ $murid->firstItem() ?? 0 }} - {{ $murid->lastItem() ?? 0 }} dari {{ $murid->total() }} murid
        </div>

    </div>
</div>

@endsection