@extends('layouts.app')

@section('content')

<style>
    /* ============================
           EDIT MURID STYLE
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

    .card-edit .card-body {
        padding: 30px;
        background: #fff;
    }

    /* ===== FORM ELEMENTS ===== */
    .form-group {
        margin-bottom: 20px;
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
        margin-right: 6px;
        width: 18px;
    }

    .form-control, .form-select {
        border: 2px solid #FDEBD0;
        border-radius: 12px;
        padding: 10px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #FFFAF0;
        color: #2C3E50;
    }

    .form-control:focus, .form-select:focus {
        border-color: #F39C12;
        box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
        outline: none;
        background: #fff;
    }

    .form-control:hover, .form-select:hover {
        border-color: #FDCB6E;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(243, 156, 18, 0.1);
    }

    .form-control::placeholder {
        color: #BDC3C7;
        font-size: 13px;
    }

    /* ===== PHOTO SECTION ===== */
    .photo-section {
        text-align: center;
        padding: 20px;
        background: #FFFAF0;
        border-radius: 15px;
        border: 2px dashed #FDEBD0;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .photo-section .current-photo {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #FDCB6E;
        box-shadow: 0 5px 20px rgba(243, 156, 18, 0.2);
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .photo-section .current-photo:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(243, 156, 18, 0.3);
    }

    .photo-section .photo-placeholder {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FDEBD0, #FDCB6E);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 72px;
        color: #F39C12;
        border: 5px solid #FDCB6E;
        margin: 0 auto 15px;
    }

    .photo-section .photo-label {
        font-size: 13px;
        color: #7F8C8D;
        margin-bottom: 10px;
    }

    .photo-section .file-input-wrapper {
        width: 100%;
    }

    .photo-section .file-input-wrapper .form-control {
        padding: 8px 12px;
        background: #fff;
    }

    .photo-section .file-input-wrapper .form-control::-webkit-file-upload-button {
        background: linear-gradient(135deg, #FDCB6E, #F39C12);
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 12px;
    }

    .photo-section .file-input-wrapper .form-control::-webkit-file-upload-button:hover {
        transform: scale(1.05);
        box-shadow: 0 3px 10px rgba(243, 156, 18, 0.3);
    }

    /* Preview Foto baru */
    .photo-preview {
        margin-top: 10px;
        padding: 10px;
        background: #fff;
        border-radius: 12px;
        border: 2px solid #FDCB6E;
        display: none;
        width: 100%;
    }

    .photo-preview img {
        max-width: 100%;
        max-height: 150px;
        border-radius: 10px;
    }

    .photo-preview.show {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    /* ===== BUTTONS ===== */
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

    /* ===== FORM DIVIDER ===== */
    .form-divider {
        border-top: 2px dashed #FDEBD0;
        margin: 25px 0;
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

    /* ===== ANIMATIONS ===== */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
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

        .card-edit .card-body {
            padding: 20px;
        }

        .photo-section {
            min-height: 250px;
            padding: 15px;
        }

        .photo-section .current-photo,
        .photo-section .photo-placeholder {
            width: 140px;
            height: 140px;
            font-size: 56px;
        }

        .form-group label {
            font-size: 13px;
        }

        .form-control, .form-select {
            font-size: 13px;
            padding: 8px 12px;
        }
    }

    @media (max-width: 768px) {
        .card-edit .card-body {
            padding: 15px;
        }

        .photo-section {
            min-height: 200px;
            margin-bottom: 20px;
        }

        .photo-section .current-photo,
        .photo-section .photo-placeholder {
            width: 120px;
            height: 120px;
            font-size: 48px;
        }

        .btn-update, .btn-kembali {
            width: 100%;
            justify-content: center;
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-group-form {
            flex-direction: column;
            gap: 10px;
        }
    }

    @media (max-width: 576px) {
        .page-header h4 {
            font-size: 16px;
        }

        .card-edit .card-body {
            padding: 12px;
        }

        .photo-section .current-photo,
        .photo-section .photo-placeholder {
            width: 100px;
            height: 100px;
            font-size: 40px;
            border-width: 3px;
        }

        .form-group label {
            font-size: 12px;
        }

        .form-control, .form-select {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 10px;
        }

        .photo-section .file-input-wrapper .form-control::-webkit-file-upload-button {
            padding: 6px 15px;
            font-size: 12px;
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
        Edit Data Murid
    </h4>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ $dashboardRoute }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('murid.index') }}">Data Murid</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #27AE60; font-weight: 600;">Edit</span>
    </div>
</div>
<!-- ===== EDIT FORM ===== -->
<div class="card card-edit shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-pencil-square"></i>
            Form Edit Murid
            <small style="font-size: 14px; font-weight: 400; opacity: 0.9;">
                - {{ $murid->nama }}
            </small>
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('murid.update', $murid->id) }}"
              method="POST"
              enctype="multipart/form-data"
              id="formEditMurid">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- ===== PHOTO SECTION ===== -->
                <div class="col-md-3">
                    <div class="photo-section">
                        @if($murid->foto)
                            <img src="{{ asset('storage/'.$murid->foto) }}"
                                 alt="Foto {{ $murid->nama }}"
                                 class="current-photo"
                                 id="currentPhoto">
                        @else
                            <div class="photo-placeholder">
                                <i class="bi bi-person"></i>
                            </div>
                        @endif

                        <div class="photo-label">
                            <i class="bi bi-info-circle"></i>
                            Foto saat ini
                        </div>

                        <div class="file-input-wrapper">
                            <input type="file"
                                   name="foto"
                                   class="form-control"
                                   id="inputFoto"
                                   accept="image/*">
                        </div>

                        <div class="photo-preview" id="previewFoto">
                            <img src="#" alt="Preview Foto" id="previewImg">
                            <p style="font-size: 12px; color: #7F8C8D; margin-top: 5px;">
                                <i class="bi bi-info-circle"></i>
                                Foto baru akan mengganti foto lama
                            </p>
                        </div>

                        <small class="text-muted" style="font-size: 11px; margin-top: 8px;">
                            <i class="bi bi-info-circle"></i>
                            Format: JPG, PNG, GIF (Max: 2MB)
                        </small>
                    </div>
                </div>

                <!-- ===== FORM FIELDS ===== -->
                <div class="col-md-9">
                    <div class="row">

                        <!-- NIS -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-hash"></i>
                                    NIS
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                       name="nis"
                                       class="form-control"
                                       value="{{ old('nis', $murid->nis) }}"
                                       placeholder="Masukkan NIS murid"
                                       required>
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-person"></i>
                                    Nama Lengkap
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       value="{{ old('nama', $murid->nama) }}"
                                       placeholder="Masukkan nama lengkap murid"
                                       required>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-gender-ambiguous"></i>
                                    Jenis Kelamin
                                    <span class="required">*</span>
                                </label>
                                <select name="jenis_kelamin"
                                        class="form-select"
                                        required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $murid->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                         Laki-Laki
                                    </option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $murid->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                         Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-book"></i>
                                    Kelas
                                    <span class="required">*</span>
                                </label>
                                <select name="kelas"
                                        class="form-select"
                                        required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <option value="A" {{ old('kelas', $murid->kelas) == 'A' ? 'selected' : '' }}>
                                        Kelas A
                                    </option>
                                    <option value="B" {{ old('kelas', $murid->kelas) == 'B' ? 'selected' : '' }}>
                                        Kelas B
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Form Divider -->
                        <div class="col-12">
                            <div class="form-divider">
                                <span>Data Kelahiran</span>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-geo-alt"></i>
                                    Tempat Lahir
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                       name="tempat_lahir"
                                       class="form-control"
                                       value="{{ old('tempat_lahir', $murid->tempat_lahir) }}"
                                       placeholder="Contoh: Jakarta"
                                       required>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-calendar3"></i>
                                    Tanggal Lahir
                                    <span class="required">*</span>
                                </label>
                                <input type="date"
                                       name="tanggal_lahir"
                                       class="form-control"
                                       value="{{ old('tanggal_lahir', $murid->tanggal_lahir) }}"
                                       required>
                            </div>
                        </div>

                        <!-- Form Divider -->
                        <div class="col-12">
                            <div class="form-divider">
                                <span>Data Akademik & Orang Tua</span>
                            </div>
                        </div>

                        <!-- Nama Orang Tua -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-people"></i>
                                    Nama Orang Tua
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                       name="nama_orangtua"
                                       class="form-control"
                                       value="{{ old('nama_orangtua', $murid->nama_orangtua) }}"
                                       placeholder="Masukkan nama orang tua/wali"
                                       required>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="bi bi-house"></i>
                                    Alamat
                                    <span class="required">*</span>
                                </label>
                                <textarea name="alamat"
                                          rows="3"
                                          class="form-control"
                                          placeholder="Masukkan alamat lengkap murid"
                                          required>{{ old('alamat', $murid->alamat) }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ===== BUTTONS ===== -->
            <div class="mt-4">
                <div class="d-flex gap-2 flex-wrap btn-group-form">
                    <button type="submit" class="btn-update">
                        <i class="bi bi-save"></i>
                        Update Data
                    </button>
                    <a href="{{ route('murid.index') }}" class="btn-kembali">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- ===== SCRIPT PREVIEW FOTO ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputFoto = document.getElementById('inputFoto');
        const previewFoto = document.getElementById('previewFoto');
        const previewImg = document.getElementById('previewImg');
        const currentPhoto = document.getElementById('currentPhoto');

        inputFoto.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewFoto.classList.add('show');
                    if (currentPhoto) {
                        currentPhoto.style.display = 'none';
                    }
                }
                reader.readAsDataURL(file);
            } else {
                previewFoto.classList.remove('show');
                if (currentPhoto) {
                    currentPhoto.style.display = 'block';
                }
            }
        });
    });
</script>

@endsection