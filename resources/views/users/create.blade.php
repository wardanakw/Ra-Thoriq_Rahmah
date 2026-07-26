@extends('layouts.app')

@section('content')

<style>
    /* ============================
           CREATE USER STYLE
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
        border-left: 5px solid #27AE60;
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
        color: #27AE60;
        font-size: 28px;
    }

    .page-header .breadcrumb-custom {
        font-size: 14px;
        color: #7F8C8D;
    }

    .page-header .breadcrumb-custom a {
        color: #27AE60;
        text-decoration: none;
        font-weight: 600;
    }

    .page-header .breadcrumb-custom a:hover {
        text-decoration: underline;
    }

    /* ===== CARD ===== */
    .card-create {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-create .card-header {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-create .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-create .card-header h4 i {
        font-size: 24px;
        color: #FFE66D;
    }

    .card-create .card-body {
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
        color: #27AE60;
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
        border: 2px solid #E8F5E9;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #FAFFFE;
        color: #2C3E50;
    }

    .form-control:focus, .form-select:focus {
        border-color: #88D8B0;
        box-shadow: 0 0 0 0.2rem rgba(136, 216, 176, 0.25);
        outline: none;
        background: #fff;
    }

    .form-control:hover, .form-select:hover {
        border-color: #A8E6CF;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(136, 216, 176, 0.08);
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

    /* Password Toggle */
    .password-wrapper {
        position: relative;
    }

    .password-wrapper .form-control {
        padding-right: 50px;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #BDC3C7;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 5px;
    }

    .password-toggle:hover {
        color: #27AE60;
    }

    .password-toggle:focus {
        outline: none;
    }

    /* ===== PASSWORD STRENGTH ===== */
    .password-strength {
        margin-top: 8px;
        display: none;
    }

    .password-strength.show {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .password-strength .strength-bar {
        height: 4px;
        border-radius: 4px;
        background: #E8F5E9;
        overflow: hidden;
        margin-bottom: 4px;
    }

    .password-strength .strength-bar .bar {
        height: 100%;
        border-radius: 4px;
        transition: all 0.3s ease;
        width: 0%;
    }

    .password-strength .strength-text {
        font-size: 12px;
        font-weight: 600;
    }

    .password-strength .strength-text.weak {
        color: #E74C3C;
    }
    .password-strength .strength-text.medium {
        color: #F39C12;
    }
    .password-strength .strength-text.strong {
        color: #27AE60;
    }

    /* ===== BUTTONS ===== */
    .btn-group-form {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .btn-simpan {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        color: #fff;
        border: none;
        padding: 12px 35px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 15px rgba(136, 216, 176, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-simpan:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 25px rgba(136, 216, 176, 0.4);
        background: linear-gradient(135deg, #88D8B0, #6BCB9A);
        color: #fff;
    }

    .btn-simpan i {
        font-size: 18px;
    }

    .btn-kembali {
        background: #F8F9FA;
        color: #4A4A4A;
        border: 2px solid #E8F5E9;
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

    /* ===== ANIMATIONS ===== */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
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
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h4 {
            font-size: 18px;
        }

        .card-create .card-body {
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
        .card-create .card-body {
            padding: 15px;
        }

        .btn-simpan, .btn-kembali {
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

        .card-create .card-body {
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

        .password-toggle {
            font-size: 16px;
            right: 8px;
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
        <i class="bi bi-person-plus-fill"></i>
        Tambah User
    </h4>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ $dashboardRoute }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('users.index') }}">Data User</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #27AE60; font-weight: 600;">Tambah</span>
    </div>
</div>

<!-- ===== CREATE FORM ===== -->
<div class="card card-create shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-person-gear"></i>
            Form Tambah User
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST" id="formCreateUser">
            @csrf

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
                       value="{{ old('nama') }}"
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
                       value="{{ old('username') }}"
                       placeholder="Masukkan username untuk login"
                       required>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Username digunakan untuk login ke sistem (minimal 3 karakter, unik)
                </small>
                @error('username')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ===== PASSWORD ===== -->
            <div class="form-group">
                <label>
                    <i class="bi bi-lock"></i>
                    Password
                    <span class="required">*</span>
                </label>
                <div class="password-wrapper">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="passwordInput"
                           placeholder="Masukkan password (minimal 6 karakter)"
                           required>
                    <button type="button"
                            class="password-toggle"
                            id="passwordToggle"
                            title="Tampilkan/Sembunyikan password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="bar" id="strengthBar"></div>
                    </div>
                    <div class="strength-text" id="strengthText"></div>
                </div>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Password minimal 6 karakter, gunakan kombinasi huruf dan angka
                </small>
                @error('password')
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
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                        <i class="bi bi-shield-fill"></i> Admin
                    </option>
                    <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>
                        <i class="bi bi-star-fill"></i> Guru
                    </option>
                </select>
                <small class="help-text">
                    <i class="bi bi-info-circle"></i>
                    Admin memiliki akses penuh ke sistem, Guru hanya akses terbatas
                </small>
                @error('role')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ===== BUTTONS ===== -->
            <div class="btn-group-form">
                <button type="submit" class="btn-simpan">
                    <i class="bi bi-save"></i>
                    Simpan User
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
        // ===== AUTO FOCUS =====
        const firstInput = document.querySelector('input[name="nama"]');
        if (firstInput) {
            firstInput.focus();
        }

        // ===== PASSWORD TOGGLE =====
        const passwordInput = document.getElementById('passwordInput');
        const passwordToggle = document.getElementById('passwordToggle');

        if (passwordToggle && passwordInput) {
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        }

        // ===== PASSWORD STRENGTH =====
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strengthContainer = document.getElementById('passwordStrength');
                const strengthBar = document.getElementById('strengthBar');
                const strengthText = document.getElementById('strengthText');

                if (password.length === 0) {
                    strengthContainer.classList.remove('show');
                    return;
                }

                strengthContainer.classList.add('show');

                let strength = 0;
                let label = '';
                let color = '';

                // Cek panjang
                if (password.length >= 6) strength += 1;
                if (password.length >= 10) strength += 1;

                // Cek huruf dan angka
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
                if (/\d/.test(password)) strength += 1;
                if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

                // Tentukan level
                if (strength <= 1) {
                    label = 'Lemah';
                    color = '#E74C3C';
                    strengthBar.style.width = '25%';
                    strengthBar.style.background = color;
                    strengthText.className = 'strength-text weak';
                } else if (strength <= 3) {
                    label = 'Sedang';
                    color = '#F39C12';
                    strengthBar.style.width = '50%';
                    strengthBar.style.background = color;
                    strengthText.className = 'strength-text medium';
                } else if (strength <= 4) {
                    label = 'Kuat';
                    color = '#27AE60';
                    strengthBar.style.width = '75%';
                    strengthBar.style.background = color;
                    strengthText.className = 'strength-text strong';
                } else {
                    label = 'Sangat Kuat';
                    color = '#1E8449';
                    strengthBar.style.width = '100%';
                    strengthBar.style.background = color;
                    strengthText.className = 'strength-text strong';
                }

                strengthText.innerHTML = `<i class="bi bi-shield-${strength <= 2 ? 'exclamation' : 'check'}"></i> ${label}`;
            });
        }

        // ===== VALIDASI FORM =====
        const form = document.getElementById('formCreateUser');
        if (form) {
            form.addEventListener('submit', function(e) {
                const nama = document.querySelector('input[name="nama"]').value.trim();
                const username = document.querySelector('input[name="username"]').value.trim();
                const password = document.querySelector('input[name="password"]').value.trim();
                const role = document.querySelector('select[name="role"]').value;

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

                if (password.length < 6) {
                    e.preventDefault();
                    alert('Password harus minimal 6 karakter!');
                    document.querySelector('input[name="password"]').focus();
                    return false;
                }

                if (!role) {
                    e.preventDefault();
                    alert('Silakan pilih Role!');
                    document.querySelector('select[name="role"]').focus();
                    return false;
                }

                return true;
            });
        }
    });
</script>

@endsection