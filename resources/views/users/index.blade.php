@extends('layouts.app')

@section('content')

<style>
    /* ============================
           DATA USER STYLE
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
        border-left: 5px solid #6C5CE7;
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
        color: #6C5CE7;
        font-size: 28px;
    }

    .page-header .header-sub {
        font-size: 14px;
        color: #7F8C8D;
        font-weight: 600;
        margin-top: 2px;
    }

    .page-header .header-sub span {
        color: #6C5CE7;
        font-weight: 700;
    }

    /* Button Tambah */
    .btn-tambah {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7);
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 3px 15px rgba(108, 92, 231, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 25px rgba(108, 92, 231, 0.4);
        background: linear-gradient(135deg, #6C5CE7, #5A4BD1);
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
        box-shadow: 0 3px 15px rgba(108, 92, 231, 0.15);
        background: linear-gradient(135deg, #EDE7F6, #D1C4E9);
        color: #4A148C;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideDown 0.5s ease;
        margin-bottom: 20px;
    }

    .alert-custom i {
        font-size: 24px;
        color: #6C5CE7;
    }

    .alert-custom .btn-close {
        filter: brightness(0);
        opacity: 0.5;
    }

    .alert-custom .btn-close:hover {
        opacity: 1;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== CARD ===== */
    .card-data {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-data .card-header {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-data .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-data .card-header h4 i {
        font-size: 24px;
        color: #FFE66D;
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

    .table-user {
        margin-bottom: 0;
        background: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-user thead {
        background: linear-gradient(135deg, #EDE7F6, #D1C4E9);
    }

    .table-user thead th {
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

    .table-user thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .table-user thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .table-user tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #F0F0F0;
    }

    .table-user tbody tr:hover {
        background: #F8F5FF;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.05);
    }

    .table-user tbody td {
        padding: 12px 12px;
        vertical-align: middle;
        font-size: 14px;
        color: #4A4A4A;
        border: none;
        text-align: center;
    }

    .table-user tbody td:first-child {
        font-weight: 700;
        color: #6C5CE7;
        font-size: 16px;
    }

    .table-user tbody td:nth-child(2) {
        text-align: left;
        font-weight: 600;
        color: #2C3E50;
    }

    /* ===== BADGE ROLE ===== */
    .badge-role {
        padding: 6px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-role.admin {
        background: #EDE7F6;
        color: #6C5CE7;
        border: 2px solid #6C5CE7;
    }

    .badge-role.guru {
        background: #E8F5E9;
        color: #27AE60;
        border: 2px solid #27AE60;
    }

    .badge-role i {
        font-size: 14px;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-action {
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
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

    .btn-edit {
        background: #FDCB6E;
        color: #2C3E50;
    }

    .btn-edit:hover {
        background: #F39C12;
        color: #fff;
    }

    .btn-hapus {
        background: #FF6B6B;
        color: #fff;
    }

    .btn-hapus:hover {
        background: #E74C3C;
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
        color: #6C5CE7;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 50px;
        transition: all 0.3s ease;
        background: #F8F5FF;
    }

    .pagination-custom .page-link:hover {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
    }

    .pagination-custom .active .page-link {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7);
        color: #fff;
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        padding: 50px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 64px;
        color: #D1C4E9;
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

        .card-data .card-body {
            padding: 20px;
        }

        .table-user thead th {
            font-size: 11px;
            padding: 10px 8px;
        }

        .table-user tbody td {
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

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }

        .table-user tbody td {
            font-size: 11px;
            padding: 8px 6px;
        }

        .badge-role {
            font-size: 10px;
            padding: 4px 12px;
        }

        .btn-action {
            padding: 3px 8px;
            font-size: 10px;
        }

        .btn-action i {
            font-size: 10px;
        }
    }

    @media (max-width: 576px) {
        .card-data .card-body {
            padding: 15px;
        }

        .table-user thead th {
            font-size: 9px;
            padding: 6px 4px;
        }

        .table-user tbody td {
            font-size: 10px;
            padding: 6px 4px;
        }

        .btn-action {
            padding: 2px 6px;
            font-size: 9px;
            margin: 1px;
        }

        .btn-action i {
            font-size: 9px;
        }

        .badge-role {
            font-size: 9px;
            padding: 3px 8px;
            gap: 3px;
        }

        .badge-role i {
            font-size: 10px;
        }
    }
</style>

<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <div>
        <h4>
            <i class="bi bi-people-fill"></i>
            Data User
        </h4>
        <div class="header-sub">
            <i class="bi bi-person"></i>
            Total: <span>{{ $users->total() }}</span> user terdaftar
        </div>
    </div>
    <div>
        <a href="{{ route('users.create') }}" class="btn btn-tambah">
            <i class="bi bi-person-plus"></i>
            Tambah User
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
    <div class="card-header">
        <h4>
            <i class="bi bi-person-badge"></i>
            Manajemen User
        </h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-user">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <i class="bi bi-person-circle" style="color: #6C5CE7; margin-right: 8px;"></i>
                            {{ $user->nama }}
                        </td>
                        <td>
                            <span style="font-weight: 600; color: #6C5CE7;">
                                <i class="bi bi-at"></i> {{ $user->username }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-role {{ $user->role }}">
                                @if($user->role == 'admin')
                                    <i class="bi bi-shield-check"></i>
                                @else
                                    <i class="bi bi-star-fill"></i>
                                @endif
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-action btn-edit"
                                   title="Edit User">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus user {{ $user->nama }}?')"
                                            class="btn btn-action btn-hapus"
                                            title="Hapus User">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="bi bi-people"></i>
                                <h5>Belum Ada Data User</h5>
                                <p>Klik tombol "Tambah User" untuk menambahkan user baru ke sistem.</p>
                                <a href="{{ route('users.create') }}" class="btn btn-tambah" style="margin-top: 15px;">
                                    <i class="bi bi-person-plus"></i>
                                    Tambah User Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ===== PAGINATION ===== -->
        @if($users->hasPages())
        <div class="pagination-custom">
            {{ $users->links() }}
        </div>
        @endif

        <!-- ===== INFO ===== -->
        @if($users->total() > 0)
        <div class="mt-3 text-center text-muted" style="font-size: 13px;">
            <i class="bi bi-info-circle"></i>
            Menampilkan {{ $users->firstItem() ?? 0 }} - {{ $users->lastItem() ?? 0 }} dari {{ $users->total() }} user
        </div>
        @endif

    </div>
</div>

@endsection