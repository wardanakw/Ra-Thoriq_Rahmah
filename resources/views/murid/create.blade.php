@extends('layouts.app')

@section('content')

<style>
    /* ============================
           FORM MURID STYLE
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
    .card-form {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .card-form .card-header {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-form .card-header h4 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-form .card-header h4 i {
        font-size: 24px;
        color: #FFE66D;
    }

    .card-form .card-body {
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
        color: #27AE60;
        margin-right: 6px;
        width: 18px;
    }

    .form-control, .form-select {
        border: 2px solid #E8F5E9;
        border-radius: 12px;
        padding: 10px 15px;
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
        box-shadow: 0 3px 10px rgba(136, 216, 176, 0.1);
    }

    .form-control::placeholder {
        color: #BDC3C7;
        font-size: 13px;
    }

    /* File Input */
    .file-input-wrapper {
        position: relative;
    }

    .file-input-wrapper .form-control {
        padding: 8px 12px;
    }

    .file-input-wrapper .form-control::-webkit-file-upload-button {
        background: linear-gradient(135deg, #A8E6CF, #88D8B0);
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 12px;
    }

    .file-input-wrapper .form-control::-webkit-file-upload-button:hover {
        transform: scale(1.05);
        box-shadow: 0 3px 10px rgba(136, 216, 176, 0.3);
    }

    /* ===== BUTTONS ===== */
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

    /* ===== PREVIEW FOTO ===== */
    .foto-preview {
        margin-top: 10px;
        padding: 15px;
        background: #FAFFFE;
        border: 2px dashed #E8F5E9;
        border-radius: 12px;
        text-align: center;
        display: none;
    }

    .foto-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 12px;
        border: 3px solid #A8E6CF;
    }

    .foto-preview.show {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    /* ===== FORM DIVIDER ===== */
    .form-divider {
        border-top: 2px dashed #E8F5E9;
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

    /* ===== ERROR STYLING ===== */
    .is-invalid {
        border-color: #E74C3C !important;
        background: #FFF5F5 !important;
    }

    .is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25) !important;
    }

    .invalid-feedback {
        color: #E74C3C;
        font-size: 12px;
        font-weight: 600;
        margin-top: 4px;
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
    @media (max-width: 768px) {
        .page-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h4 {
            font-size: 18px;
        }

        .card-form .card-body {
            padding: 20px;
        }

        .form-group label {
            font-size: 13px;
        }

        .form-control, .form-select {
            font-size: 13px;
            padding: 8px 12px;
        }

        .btn-simpan, .btn-kembali {
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
        .card-form .card-body {
            padding: 15px;
        }

        .page-header h4 {
            font-size: 16px;
        }

        .form-group label {
            font-size: 12px;
        }

        .form-control, .form-select {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 10px;
        }

        .file-input-wrapper .form-control::-webkit-file-upload-button {
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

<!-- ===== FORM CARD ===== -->
<div class="card card-form shadow">
    <div class="card-header">
        <h4>
            <i class="bi bi-pencil-square"></i>
            Form Pendaftaran Murid
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('murid.store') }}"
              method="POST"
              enctype="multipart/form-data"
              id="formMurid">
            @csrf

            <div class="row">

                <!-- ===== FOTO ===== -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <i class="bi bi-image"></i>
                            Foto Murid
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file"
                                   name="foto"
                                   class="form-control"
                                   id="inputFoto"
                                   accept="image/*">
                        </div>
                        <div class="foto-preview" id="previewFoto">
                            <img src="#" alt="Preview Foto" id="previewImg">
                            <p style="font-size: 12px; color: #7F8C8D; margin-top: 8px;">
                                <i class="bi bi-info-circle"></i>
                                Klik gambar untuk mengganti
                            </p>
                        </div>
                        <small class="text-muted" style="font-size: 12px;">
                            <i class="bi bi-info-circle"></i>
                            Format: JPG, PNG, GIF (Max: 2MB)
                        </small>
                    </div>
                </div>

                <!-- ===== NIS ===== -->
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
                               placeholder="Masukkan NIS murid"
                               required>
                    </div>
                </div>

                <!-- ===== NAMA LENGKAP ===== -->
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
                               placeholder="Masukkan nama lengkap murid"
                               required>
                    </div>
                </div>

                <!-- ===== JENIS KELAMIN ===== -->
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
                            <option value="Laki-laki"> Laki-Laki</option>
                            <option value="Perempuan"> Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- ===== FORM DIVIDER ===== -->
                <div class="col-12">
                    <div class="form-divider">
                        <span>Data Kelahiran</span>
                    </div>
                </div>

                <!-- ===== TEMPAT LAHIR ===== -->
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
                               placeholder="Contoh: Jakarta"
                               required>
                    </div>
                </div>

                <!-- ===== TANGGAL LAHIR ===== -->
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
                               required>
                    </div>
                </div>

                <!-- ===== FORM DIVIDER ===== -->
                <div class="col-12">
                    <div class="form-divider">
                        <span>Data Akademik & Orang Tua</span>
                    </div>
                </div>

                <!-- ===== KELAS ===== -->
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
                            <option value="A">Kelas A</option>
                            <option value="B">Kelas B</option>
                        </select>
                    </div>
                </div>

                <!-- ===== NAMA ORANG TUA ===== -->
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
                               placeholder="Masukkan nama orang tua/wali"
                               required>
                    </div>
                </div>

                <!-- ===== ALAMAT ===== -->
                <div class="col-12">
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
                                  required></textarea>
                    </div>
                </div>

            </div>

            <!-- ===== BUTTONS ===== -->
            <div class="mt-4">
                <div class="d-flex gap-2 flex-wrap btn-group-form">
                    <button type="submit" class="btn-simpan">
                        <i class="bi bi-save"></i>
                        Simpan Data
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

        inputFoto.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewFoto.classList.add('show');
                }
                reader.readAsDataURL(file);
            } else {
                previewFoto.classList.remove('show');
                previewImg.src = '#';
            }
        });

        // Klik preview untuk upload ulang
        previewFoto.addEventListener('click', function() {
            inputFoto.click();
        });
    });
</script>

@endsection