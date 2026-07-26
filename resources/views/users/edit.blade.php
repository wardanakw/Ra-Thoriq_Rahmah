@extends('layouts.app')

@section('content')

<style>
    /* ============================
           EDIT USER STYLE
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
        border-left: 5px solid #FDCB6E;
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
        color: #F39C12;
        font-size: 28px;
    }

    .page-header .breadcrumb-custom {
        font-size: 14px;
        color: #7F8C8D;
    }

    .page-header .breadcrumb-custom a {
        color: #F39C12;
        text-decoration: none;
        font-weight: 600;
    }

    .page-header .breadcrumb-custom a:hover {
        text-decoration: underline;
    }

    /* ===== CARD ===== */
    .card-edit {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-edit .card-header {
        background: linear-gradient(135deg, #FDCB6E, #F39C12) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FF6B6B;
    }

    .card-edit .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-edit .card-header h4 i {
        font-size: 24px;
        color: #FF6B6B;
    }

    .card-edit .card-header h4 small {
        font-size: 14px;
        font-weight: 400;
        opacity: 0.9;
    }

    .card-edit .card-body {
        padding: 30px;
        background: #fff;
    }

    /* ===== FORM ELEMENTS ===== */
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        font-weight: 700;
        color: #2C3E50;
        font-size: 14px;
        margin-bottom: 6px;
        display: block;
    }

    .form-group label .required {
        color: #E74C3C;
        margin-left: 4px;
    }

    .form-group label i {
        color: #F39C12;
        margin-right: 8px;
        width: 20px;
        text-align: center;
    }

    .form-group .help-text {
        font-size: 12px;
        color: #BDC3C7;
        margin-top: 4px;
        display: block;
    }

    .form-control, .form-select {
        border: 2px solid #FDEBD0;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #FFFAF0;
        color: #2C3E50;
    }

    .form-control:focus, .form-select:focus {
        border-color: #F39C12;
        box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.15);
        outline: none;
        background: #fff;
    }

    .form-control:hover, .form-select:hover {
        border-color: #FDCB6E;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(243, 156, 18, 0.08);
    }

    .form-control::placeholder {
        color: #BDC3C7;
        font-size: 13px;
    }

    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #E74C3C !important;
        background: #FFF5F5 !important;
    }

    .form-control.is-invalid:focus, .form-select.is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.15) !important;
    }

    .invalid-feedback {
        color: #E74C3C;
        font-size: 12px;
        font-weight: 600;
        margin-top: 4px;
        display: block;
    }

    .invalid-feedback i {
        margin-right: 4px;
    }

    /* ===== FORM DIVIDER ===== */
    .form-divider {
        border-top: 2px dashed #FDEBD0;
        margin: 30px 0;
        position: relative;
    }

    .form-divider span {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: #fff;
        padding: 0 15px;
        font-size: 12px;
        font-weight: 700;
        color: #BDC3C7;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* ===== BUTTONS ===== */
    .btn-group-form {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .btn-update {
        background: linear-gradient(135deg, #FDCB6E, #F39C12);
        color: #fff;
        border: none;
        padding: 12px 35px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 15px rgba(243, 156, 18, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-update:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 25px rgba(243, 156, 18, 0.4);
        background: linear-gradient(135deg, #F39C12, #E67E22);
        color: #fff;
    }

    .btn-update i {
        font-size: 18px;
    }

    .btn-kembali {
        background: #F8F9FA;
        color: #4A4A4A;
        border: 2px solid #FDEBD0;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-kembali:hover {
        background: #FFF5F5;
        border-color: #FF6B6B;
        color: #FF6B6B;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.1);
    }

    .btn-kembali i {
        font-size: 18px;
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

        .card-edit .card-body {
            padding: 20px;
        }

        .form-group label {
            font-size: 13px;
        }

        .form-control, .form-select {
            font-size: 13px;
            padding: 10px 14px;
        }
    }

    @media (max-width: 768px) {
        .card-edit .card-body {
            padding: 15px;
        }

        .btn-update, .btn-kembali {
            width: 100%;
            justify-content: center;
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-group-form {
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-control, .form-select {
            font-size: 13px;
            padding: 8px 12px;
        }
    }

    @media (max-width: 576px) {
        .page-header h4 {
            font-size: 16px;
        }

        .page-header .breadcrumb-custom {
            font-size: 12px;
        }

        .card-edit .card-body {
            padding: 12px;
        }

        .form-group label {
            font-size: 12px;
        }

        .form-control, .form-select {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 10px;
        }

        .form-group .help-text {
            font-size: 11px;
        }
    }
</style>

<!-- ===== PAGE HEADER ===== -->
@php
    $dashboardRoute = auth()->check()
        ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('guru.dashboard'))
        : route('login');
@endphp
<div class="page-header">
    <h4>
        <i class="bi bi-pencil-square"></i>
        Edit User
    </h4>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ $dashboardRoute }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('users.index') }}">Data User</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #F39C12; font-weight: 600;">Edit</span>
    </div>
</div>

<!-- ===== EDIT FORM ===== -->
<div class="card card-edit shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-person-gear"></i>
            Edit Data User
            <small> - {{ $user->nama }}</small>
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" id="formEditUser">
            @csrf
            @method('PUT')

            <!-- ===== NAMA ===== -->
            <div class="form-group">
                <label>
                    <i class="bi bi-person"></i>
                    Nama Lengkap
                    <span class="required">*</span>
                </label>
                <input type="text"
                       name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $user->nama) }}"
                       placeholder="Masukkan nama lengkap user"
                       required>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Masukkan nama lengkap user dengan benar
                </small>
                @error('nama')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ===== USERNAME ===== -->
            <div class="form-group">
                <label>
                    <i class="bi bi-person-badge"></i>
                    Username
                    <span class="required">*</span>
                </label>
                <input type="text"
                       name="username"
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username', $user->username) }}"
                       placeholder="Masukkan username untuk login"
                       required>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Username digunakan untuk login ke sistem (minimal 3 karakter)
                </small>
                @error('username')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ===== ROLE ===== -->
            <div class="form-group">
                <label>
                    <i class="bi bi-shield-check"></i>
                    Role / Hak Akses
                    <span class="required">*</span>
                </label>
                <select name="role"
                        class="form-select @error('role') is-invalid @enderror"
                        required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                        <i class="bi bi-shield-fill"></i> Admin
                    </option>
                    <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>
                        <i class="bi bi-star-fill"></i> Guru
                    </option>
                </select>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Admin memiliki akses penuh, Guru hanya akses terbatas
                </small>
                @error('role')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ===== DIVIDER ===== -->
            <div class="form-divider">
                <span><i class="bi bi-info-circle"></i> Informasi</span>
            </div>

            <!-- ===== INFO TAMBAHAN ===== -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3" style="border-left: 4px solid #F39C12;">
                        <small class="text-muted d-block">
                            <i class="bi bi-calendar3"></i> Dibuat pada
                        </small>
                        <strong>{{ $user->created_at ? $user->created_at->isoFormat('D MMMM Y, HH:mm') : '-' }}</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3" style="border-left: 4px solid #27AE60;">
                        <small class="text-muted d-block">
                            <i class="bi bi-clock"></i> Terakhir diupdate
                        </small>
                        <strong>{{ $user->updated_at ? $user->updated_at->isoFormat('D MMMM Y, HH:mm') : '-' }}</strong>
                    </div>
                </div>
            </div>

            <!-- ===== BUTTONS ===== -->
            <div class="btn-group-form">
                <button type="submit" class="btn-update">
                    <i class="bi bi-save"></i>
                    Update User
                </button>
                <a href="{{ route('users.index') }}" class="btn-kembali">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<!-- ===== SCRIPT ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto focus ke field pertama
        const firstInput = document.querySelector('input[name="nama"]');
        if (firstInput) {
            firstInput.focus();
        }

        // Konfirmasi sebelum update
        const form = document.getElementById('formEditUser');
        if (form) {
            form.addEventListener('submit', function(e) {
                const nama = document.querySelector('input[name="nama"]').value.trim();
                const username = document.querySelector('input[name="username"]').value.trim();
                
                if (nama.length < 2) {
                    e.preventDefault();
                    alert('Nama harus minimal 2 karakter!');
                    document.querySelector('input[name="nama"]').focus();
                    return false;
                }
                
                if (username.length < 3) {
                    e.preventDefault();
                    alert('Username harus minimal 3 karakter!');
                    document.querySelector('input[name="username"]').focus();
                    return false;
                }
                
                return true;
            });
        }
    });
</script>

@endsection