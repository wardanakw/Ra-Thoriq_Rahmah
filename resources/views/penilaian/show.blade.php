@extends('layouts.app')

@section('content')

<style>
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
        border-left: 5px solid #3498DB;
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
        color: #3498DB;
        font-size: 28px;
    }

    .page-header .breadcrumb-custom {
        font-size: 14px;
        color: #7F8C8D;
    }

    .page-header .breadcrumb-custom a {
        color: #3498DB;
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
        background: linear-gradient(135deg, #74B9FF, #3498DB) !important;
        padding: 18px 25px;
        border: none;
        border-bottom: 4px solid #FFE66D;
    }

    .card-detail .card-header h3 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-detail .card-header h3 i {
        font-size: 24px;
        color: #FFE66D;
    }

    .card-detail .card-body {
        padding: 30px;
        background: #fff;
    }

    /* ===== STUDENT PROFILE ===== */
    .student-profile {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 15px 20px;
        background: #F8F9FA;
        border-radius: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .student-profile .avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #74B9FF, #3498DB);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #fff;
        flex-shrink: 0;
    }

    .student-profile .info h4 {
        font-weight: 700;
        color: #2C3E50;
        margin: 0;
    }

    .student-profile .info .sub-info {
        color: #7F8C8D;
        font-size: 14px;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 2px;
    }

    .student-profile .info .sub-info span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .student-profile .info .sub-info i {
        color: #3498DB;
    }

    /* ===== RESULT CARDS ===== */
    .result-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
    }

    .result-item {
        background: #F8F9FA;
        border-radius: 15px;
        padding: 15px 20px;
        text-align: center;
        transition: all 0.3s ease;
        border-left: 4px solid #3498DB;
    }

    .result-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .result-item .label {
        font-size: 13px;
        color: #7F8C8D;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .result-item .value {
        font-size: 28px;
        font-weight: 800;
        color: #2C3E50;
        margin: 5px 0;
    }

    .result-item .value .unit {
        font-size: 14px;
        font-weight: 600;
        color: #BDC3C7;
    }

    .result-item.highlight {
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        border-left-color: #27AE60;
    }

    .result-item.highlight .value {
        color: #27AE60;
    }

    .result-item .badge-result {
        font-size: 14px;
        padding: 6px 18px;
        border-radius: 50px;
        font-weight: 700;
    }

    /* ===== KATEGORI BADGE ===== */
    .badge-kategori {
        font-size: 16px;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 700;
        display: inline-block;
    }

    .badge-kategori.bb {
        background: #FFE5E5;
        color: #D63031;
        border: 2px solid #FF7675;
    }

    .badge-kategori.mb {
        background: #FFF3CD;
        color: #F39C12;
        border: 2px solid #FDCB6E;
    }

    .badge-kategori.bsh {
        background: #D4EDDA;
        color: #27AE60;
        border: 2px solid #6DD5A0;
    }

    .badge-kategori.bsb {
        background: #C3E6CB;
        color: #1E8449;
        border: 2px solid #58D68D;
    }

    .badge-kategori.belum {
        background: #EAECEE;
        color: #7F8C8D;
        border: 2px solid #BDC3C7;
    }

    /* ===== KATEGORI DESKRIPSI ===== */
    .kategori-description {
        background: #F8F9FA;
        border-radius: 15px;
        padding: 20px 25px;
        margin: 20px 0 25px 0;
        border-left: 5px solid #3498DB;
        transition: all 0.3s ease;
    }

    .kategori-description:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .kategori-description .kategori-title {
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .kategori-description .kategori-title .badge-kategori {
        font-size: 14px;
        padding: 4px 16px;
    }

    .kategori-description .kategori-text {
        font-size: 14px;
        color: #4A4A4A;
        line-height: 1.7;
        margin: 0;
        padding-left: 10px;
        border-left: 3px solid #E8F5E9;
        padding: 8px 12px;
        background: white;
        border-radius: 8px;
    }

    .kategori-description .kategori-text i {
        color: #3498DB;
        margin-right: 6px;
    }

    /* ===== DETAIL TABLE ===== */
    .detail-table {
        margin-top: 20px;
    }

    .detail-table .table {
        border-collapse: separate;
        border-spacing: 0 4px;
        margin-bottom: 0;
    }

    .detail-table .table thead th {
        background: linear-gradient(135deg, #EDE7F6, #D1C4E9);
        border: none;
        padding: 12px 15px;
        font-weight: 700;
        font-size: 13px;
        color: #2C3E50;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-table .table thead th:first-child {
        border-radius: 12px 0 0 0;
    }

    .detail-table .table thead th:last-child {
        border-radius: 0 12px 0 0;
    }

    .detail-table .table tbody tr {
        transition: all 0.3s ease;
        background: #FAFFFE;
    }

    .detail-table .table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        background: #F8F5FF;
    }

    .detail-table .table tbody td {
        padding: 10px 15px;
        border: none;
        vertical-align: middle;
        font-size: 14px;
        color: #4A4A4A;
        border-bottom: 1px solid #F0F0F0;
    }

    .detail-table .table tbody td:first-child {
        font-weight: 700;
        color: #3498DB;
        border-radius: 12px 0 0 12px;
    }

    .detail-table .table tbody td:last-child {
        border-radius: 0 12px 12px 0;
        font-weight: 700;
    }

    /* ===== NILAI BADGE ===== */
    .badge-nilai {
        padding: 4px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 13px;
    }

    .badge-nilai.bb {
        background: #FFE5E5;
        color: #D63031;
    }

    .badge-nilai.mb {
        background: #FFF3CD;
        color: #F39C12;
    }

    .badge-nilai.bsh {
        background: #D4EDDA;
        color: #27AE60;
    }

    .badge-nilai.bsb {
        background: #C3E6CB;
        color: #1E8449;
    }

    /* ===== BUTTONS ===== */
    .btn-group-action {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 2px solid #F0F0F0;
    }

    .btn-action {
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-action i {
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
        box-shadow: 0 3px 15px rgba(243, 156, 18, 0.3);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #F39C12, #E67E22);
        color: #fff;
    }

    .btn-print {
        background: linear-gradient(135deg, #A29BFE, #6C5CE7);
        color: #fff;
        box-shadow: 0 3px 15px rgba(108, 92, 231, 0.3);
    }

    .btn-print:hover {
        background: linear-gradient(135deg, #6C5CE7, #5A4BD1);
        color: #fff;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .page-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h3 {
            font-size: 18px;
        }

        .card-detail .card-body {
            padding: 20px;
        }

        .result-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .result-item .value {
            font-size: 22px;
        }

        .kategori-description {
            padding: 15px 20px;
        }
    }

    @media (max-width: 768px) {
        .student-profile {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }

        .student-profile .info .sub-info {
            justify-content: center;
        }

        .result-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .result-item {
            padding: 12px 15px;
        }

        .result-item .value {
            font-size: 20px;
        }

        .detail-table .table thead th {
            font-size: 11px;
            padding: 8px 10px;
        }

        .detail-table .table tbody td {
            font-size: 12px;
            padding: 8px 10px;
        }

        .badge-kategori {
            font-size: 14px;
            padding: 6px 18px;
        }

        .btn-group-action {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
            padding: 10px 20px;
        }

        .kategori-description .kategori-title {
            font-size: 14px;
            flex-wrap: wrap;
        }

        .kategori-description .kategori-text {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .page-header h3 {
            font-size: 16px;
        }

        .card-detail .card-body {
            padding: 15px;
        }

        .result-grid {
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .result-item .label {
            font-size: 11px;
        }

        .result-item .value {
            font-size: 18px;
        }

        .result-item .badge-result {
            font-size: 12px;
            padding: 4px 12px;
        }

        .badge-kategori {
            font-size: 12px;
            padding: 4px 14px;
        }

        .badge-nilai {
            font-size: 11px;
            padding: 3px 12px;
        }

        .student-profile .avatar {
            width: 48px;
            height: 48px;
            font-size: 22px;
        }

        .student-profile .info h4 {
            font-size: 16px;
        }

        .student-profile .info .sub-info {
            font-size: 12px;
            gap: 10px;
        }

        .kategori-description {
            padding: 12px 15px;
        }

        .kategori-description .kategori-title {
            font-size: 13px;
        }

        .kategori-description .kategori-text {
            font-size: 12px;
            padding: 6px 10px;
        }
    }
    /* ================================================================ */
/* ===== STYLE KHUSUS UNTUK CETAK (PRINT) ===== */
/* ================================================================ */
@media print {
    /* Sembunyikan elemen yang tidak perlu saat cetak */
    .no-print,
    .page-header,
    .breadcrumb-custom,
    .btn-group-action,
    .btn-action,
    .btn-kembali,
    .btn-edit,
    .btn-print {
        display: none !important;
    }

    /* Atur margin halaman A4 */
    @page {
        margin: 1.5cm 1.5cm 1.5cm 1.5cm;
        size: A4 portrait;
    }

    /* Body cetak */
    body {
        background: white !important;
        font-size: 12px;
        color: #000 !important;
        font-family: 'Times New Roman', 'Arial', sans-serif;
    }

    /* Container */
    .container, .container-fluid {
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Card */
    .card-detail {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
        border-radius: 8px !important;
        margin: 0 !important;
    }

    .card-detail .card-header {
        background: #3498DB !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border-bottom: 3px solid #FFE66D !important;
        border-radius: 8px 8px 0 0 !important;
        padding: 12px 20px !important;
    }

    .card-detail .card-header h3 {
        color: #fff !important;
        font-size: 16px !important;
        text-shadow: none !important;
    }

    .card-detail .card-header h3 i {
        color: #FFE66D !important;
    }

    .card-detail .card-body {
        padding: 20px !important;
    }

    /* ===== HEADER LAPORAN (untuk cetak) ===== */
    .print-header {
        display: block !important;
        text-align: center;
        border-bottom: 3px double #1a5276;
        padding-bottom: 12px;
        margin-bottom: 18px;
    }

    .print-header .instansi {
        font-size: 12px;
        font-weight: 600;
        color: #2c3e50;
        letter-spacing: 2px;
    }

    .print-header .nama-sekolah {
        font-size: 20px;
        font-weight: 800;
        color: #1a5276;
        margin: 3px 0;
        letter-spacing: 3px;
    }

    .print-header .alamat-sekolah {
        font-size: 10px;
        color: #555;
        margin: 2px 0;
    }

    .print-header .judul-laporan {
        font-size: 16px;
        font-weight: 700;
        color: #2c3e50;
        margin: 10px 0 5px 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .print-header .periode {
        font-size: 12px;
        color: #555;
        font-weight: 600;
    }

    .print-header .kode-dokumen {
        font-size: 9px;
        color: #999;
        float: right;
        margin-top: -25px;
    }

    /* ===== STUDENT PROFILE ===== */
    .student-profile {
        background: #f8f9fa !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border: 1px solid #ddd !important;
        padding: 10px 15px !important;
        border-radius: 6px !important;
        margin-bottom: 15px !important;
    }

    .student-profile .avatar {
        background: #3498DB !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        width: 50px !important;
        height: 50px !important;
        font-size: 22px !important;
    }

    .student-profile .info h4 {
        font-size: 15px !important;
        color: #2c3e50 !important;
    }

    .student-profile .info .sub-info {
        font-size: 12px !important;
        color: #555 !important;
    }

    .student-profile .info .sub-info i {
        color: #3498DB !important;
    }

    /* ===== RESULT GRID ===== */
    .result-grid {
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 8px !important;
        margin-bottom: 15px !important;
    }

    .result-item {
        background: #f8f9fa !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border: 1px solid #e0e0e0 !important;
        border-left: 4px solid #3498DB !important;
        padding: 8px 12px !important;
        border-radius: 6px !important;
        box-shadow: none !important;
        transform: none !important;
    }

    .result-item:hover {
        transform: none !important;
        box-shadow: none !important;
    }

    .result-item .label {
        font-size: 10px !important;
        color: #7f8c8d !important;
    }

    .result-item .value {
        font-size: 20px !important;
        color: #2c3e50 !important;
    }

    .result-item.highlight {
        background: #e8f5e9 !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border-left-color: #27ae60 !important;
    }

    .result-item.highlight .value {
        color: #27ae60 !important;
    }

    /* ===== KATEGORI BADGE ===== */
    .badge-kategori {
        font-size: 14px !important;
        padding: 5px 20px !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border-radius: 50px !important;
    }

    .badge-kategori.bb {
        background: #FFE5E5 !important;
        color: #D63031 !important;
        border: 2px solid #FF7675 !important;
    }

    .badge-kategori.mb {
        background: #FFF3CD !important;
        color: #F39C12 !important;
        border: 2px solid #FDCB6E !important;
    }

    .badge-kategori.bsh {
        background: #D4EDDA !important;
        color: #27AE60 !important;
        border: 2px solid #6DD5A0 !important;
    }

    .badge-kategori.bsb {
        background: #C3E6CB !important;
        color: #1E8449 !important;
        border: 2px solid #58D68D !important;
    }

    .badge-kategori.belum {
        background: #EAECEE !important;
        color: #7F8C8D !important;
        border: 2px solid #BDC3C7 !important;
    }

    /* ===== KATEGORI DESKRIPSI ===== */
    .kategori-description {
        background: #f8f9fa !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border-left: 5px solid #3498DB !important;
        padding: 12px 18px !important;
        margin: 12px 0 18px 0 !important;
        border-radius: 6px !important;
        box-shadow: none !important;
        transform: none !important;
    }

    .kategori-description:hover {
        transform: none !important;
        box-shadow: none !important;
    }

    .kategori-description .kategori-title {
        font-size: 14px !important;
    }

    .kategori-description .kategori-text {
        font-size: 12px !important;
        line-height: 1.6 !important;
        background: white !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        padding: 6px 10px !important;
        border-radius: 4px !important;
    }

    /* ===== DETAIL TABLE ===== */
    .detail-table {
        margin-top: 15px !important;
    }

    .detail-table h5 {
        font-size: 13px !important;
        color: #27ae60 !important;
        margin-bottom: 10px !important;
    }

    .detail-table .table {
        border-collapse: collapse !important;
        font-size: 11px !important;
        width: 100% !important;
    }

    .detail-table .table thead th {
        background: #EDE7F6 !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        border: 1px solid #ddd !important;
        padding: 6px 10px !important;
        font-size: 10px !important;
        color: #2c3e50 !important;
        text-transform: uppercase !important;
        border-radius: 0 !important;
    }

    .detail-table .table tbody tr {
        background: white !important;
        border: none !important;
        transform: none !important;
        box-shadow: none !important;
    }

    .detail-table .table tbody tr:hover {
        transform: none !important;
        box-shadow: none !important;
        background: white !important;
    }

    .detail-table .table tbody td {
        padding: 5px 10px !important;
        border: 1px solid #eee !important;
        font-size: 11px !important;
        color: #333 !important;
        border-radius: 0 !important;
    }

    .detail-table .table tbody td:first-child {
        border-radius: 0 !important;
        color: #3498DB !important;
        font-weight: 700 !important;
    }

    .detail-table .table tbody td:last-child {
        border-radius: 0 !important;
    }

    /* ===== NILAI BADGE ===== */
    .badge-nilai {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        font-size: 10px !important;
        padding: 2px 12px !important;
        border-radius: 50px !important;
    }

    .badge-nilai.bb {
        background: #FFE5E5 !important;
        color: #D63031 !important;
    }

    .badge-nilai.mb {
        background: #FFF3CD !important;
        color: #F39C12 !important;
    }

    .badge-nilai.bsh {
        background: #D4EDDA !important;
        color: #27AE60 !important;
    }

    .badge-nilai.bsb {
        background: #C3E6CB !important;
        color: #1E8449 !important;
    }

    /* ===== TOTAL INFORMASI ===== */
    .detail-table .text-muted {
        font-size: 11px !important;
        color: #666 !important;
    }

    /* ===== FOOTER LAPORAN ===== */
    .print-footer {
        display: flex !important;
        margin-top: 25px !important;
        padding-top: 15px !important;
        border-top: 2px solid #dee2e6 !important;
        justify-content: space-between !important;
        align-items: flex-end !important;
        flex-wrap: wrap !important;
    }

    .print-footer .catatan {
        font-size: 10px !important;
        color: #6c757d !important;
        line-height: 1.6 !important;
    }

    .print-footer .catatan ul {
        margin: 3px 0 0 0 !important;
        padding-left: 18px !important;
    }

    .print-footer .catatan ul li {
        margin-bottom: 1px !important;
    }

    .print-footer .ttd {
        text-align: center !important;
        min-width: 180px !important;
    }

    .print-footer .ttd .garis {
        border-top: 1px solid #333 !important;
        width: 180px !important;
        margin: 20px auto 5px auto !important;
    }

    .print-footer .ttd .jabatan {
        font-size: 11px !important;
        font-weight: 600 !important;
        color: #333 !important;
    }

    .print-footer .ttd .nama {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #1a5276 !important;
    }

    .print-footer .ttd .nip {
        font-size: 10px !important;
        color: #6c757d !important;
    }

    /* ===== WATERMARK ===== */
    .print-watermark {
        position: fixed !important;
        bottom: 50% !important;
        left: 50% !important;
        transform: translate(-50%, 50%) rotate(-45deg) !important;
        font-size: 70px !important;
        color: rgba(0,0,0,0.03) !important;
        font-weight: 900 !important;
        letter-spacing: 10px !important;
        pointer-events: none !important;
        z-index: 999 !important;
        font-family: 'Arial', sans-serif !important;
        text-transform: uppercase !important;
    }

    /* ===== TEXT COLOR ===== */
    .text-muted {
        color: #666 !important;
    }

    .text-center {
        text-align: center !important;
    }

    .mb-3 {
        margin-bottom: 10px !important;
    }

    /* ===== PAGE BREAK ===== */
    .page-break {
        page-break-before: always !important;
    }

    .page-break-after {
        page-break-after: always !important;
    }

    /* ===== HAPUS HOVER EFFECT ===== */
    .result-item:hover,
    .kategori-description:hover,
    .detail-table .table tbody tr:hover {
        transform: none !important;
        box-shadow: none !important;
        background: inherit !important;
    }

    /* ===== CARD BODY PADDING ===== */
    .card-detail .card-body {
        padding: 15px 20px !important;
    }

    /* ===== TABLE RESPONSIVE ===== */
    .table-responsive {
        overflow: visible !important;
        width: 100% !important;
    }

    /* ===== BADGE STYLE ===== */
    .badge {
        background: #EDE7F6 !important;
        color: #6C5CE7 !important;
        font-weight: 700 !important;
        padding: 2px 10px !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    /* ===== FONT AWESOME ICON ===== */
    .bi {
        font-size: 12px !important;
    }

    .student-profile .bi,
    .result-item .bi,
    .kategori-description .bi {
        font-size: 12px !important;
    }

    /* ===== COPYRIGHT ===== */
    .print-copyright {
        text-align: center !important;
        font-size: 9px !important;
        color: #ccc !important;
        margin-top: 10px !important;
        padding-top: 8px !important;
        border-top: 1px solid #eee !important;
    }

    /* ===== KETIKA ADA GAMBAR ===== */
    img {
        max-width: 100% !important;
        height: auto !important;
    }
}
</style>

<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <h3>
        <i class="bi bi-clipboard-data"></i>
        Detail Penilaian Anak
    </h3>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ auth()->user()?->role === 'admin' ? route('admin.dashboard') : route('guru.dashboard') }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('penilaian.index') }}">Data Penilaian</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #3498DB; font-weight: 600;">Detail</span>
    </div>
</div>

<!-- ===== DETAIL CARD ===== -->
<div class="card card-detail shadow">
    <div class="card-header">
        <h3>
            <i class="bi bi-person-badge"></i>
            Hasil Penilaian Perkembangan Anak
        </h3>
    </div>

    <div class="card-body">


        <!-- ===== STUDENT PROFILE ===== -->
        <div class="student-profile">
            <div class="avatar">
                <i class="bi bi-person"></i>
            </div>
            <div class="info">
                <h4>{{ $penilaian->murid->nama }}</h4>
                <div class="sub-info">
                    <span>
                        <i class="bi bi-hash"></i>
                        NIS: {{ $penilaian->murid->nis }}
                    </span>
                    <span>
                        <i class="bi bi-book"></i>
                        Kelas: {{ $penilaian->murid->kelas }}
                    </span>
                    <span>
                        <i class="bi bi-calendar3"></i>
                        {{ \Carbon\Carbon::parse($penilaian->tanggal)->isoFormat('D MMMM Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- ===== RESULT GRID ===== -->
        <div class="result-grid">
            <!-- Agama -->
            <div class="result-item">
                <div class="label">
                    <i class="bi bi-hands-praying"></i> Nilai Agama
                </div>
                <div class="value">
                    {{ is_numeric($penilaian->agama) ? number_format((float) $penilaian->agama, 2) : '-' }}
                </div>
            </div>

            <!-- Jati Diri -->
            <div class="result-item">
                <div class="label">
                    <i class="bi bi-star"></i> Jati Diri
                </div>
                <div class="value">
                    {{ is_numeric($penilaian->jati_diri) ? number_format((float) $penilaian->jati_diri, 2) : '-' }}
                </div>
            </div>

            <!-- STEAM / Literasi -->
            <div class="result-item">
                <div class="label">
                    <i class="bi bi-book"></i> STEAM & Literasi
                </div>
                <div class="value">
                    {{ is_numeric($penilaian->steam) ? number_format((float) $penilaian->steam, 2) : '-' }}
                </div>
            </div>

            <!-- Fuzzy Result -->
            <div class="result-item highlight">
                <div class="label">
                    <i class="bi bi-cpu"></i> Hasil Fuzzy
                </div>
                <div class="value">
                    {{ is_numeric($penilaian->hasil_fuzzy) ? number_format((float) $penilaian->hasil_fuzzy, 2) : ($penilaian->hasil_fuzzy ?? '-') }}
                </div>
            </div>
        </div>

        <!-- ===== KATEGORI ===== -->
        @php
            $kategori = $penilaian->kategori ?? 'Belum ada kategori';
            $classKategori = 'belum';
            $deskripsiKategori = '';
            
            if($kategori == 'BB') {
                $classKategori = 'bb';
                $deskripsiKategori = 'Anak belum menunjukkan capaian perkembangan pada aspek penilaian dan masih memerlukan stimulasi serta pendampingan intensif.';
            } elseif($kategori == 'MB') {
                $classKategori = 'mb';
                $deskripsiKategori = 'Anak mulai menunjukkan capaian perkembangan pada aspek penilaian, namun masih memerlukan bimbingan lebih lanjut.';
            } elseif($kategori == 'BSH') {
                $classKategori = 'bsh';
                $deskripsiKategori = 'Anak menunjukkan capaian perkembangan pada aspek penilaian sesuai dengan tahapan perkembangan usianya.';
            } elseif($kategori == 'BSB') {
                $classKategori = 'bsb';
                $deskripsiKategori = 'Anak menunjukkan capaian perkembangan pada aspek penilaian yang melampaui harapan sesuai tahapan usianya.';
            } else {
                $deskripsiKategori = 'Belum ada penilaian kategori untuk anak ini.';
            }
        @endphp

        <div class="text-center mb-3">
            <span class="badge-kategori {{ $classKategori }}">
                <i class="bi bi-trophy"></i>
                {{ $kategori }}
            </span>
        </div>

        <!-- ===== KATEGORI DESKRIPSI ===== -->
        <div class="kategori-description">
            <div class="kategori-title">
                <i class="bi bi-info-circle" style="color: #3498DB;"></i>
                Deskripsi Perkembangan
                <span class="badge-kategori {{ $classKategori }}" style="font-size: 12px; padding: 2px 12px;">
                    {{ $kategori }}
                </span>
            </div>
            <p class="kategori-text">
                <i class="bi bi-quote"></i>
                {{ $deskripsiKategori }}
            </p>
        </div>

        <!-- ===== DETAIL INSTRUMEN ===== -->
        <div class="detail-table">
            <h5 class="fw-bold text-success mb-3">
                <i class="bi bi-list-check"></i>
                Detail Instrumen Penilaian
            </h5>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th width="100">Kode</th>
                            <th>Indikator</th>
                            <th width="120">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penilaian->detail as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge" style="background: #EDE7F6; color: #6C5CE7; font-weight: 700; padding: 4px 12px;">
                                    {{ $detail->indikator->kode ?? '-' }}
                                </span>
                            </td>
                            <td>{{ $detail->indikator->indikator ?? '-' }}</td>
                            <td>
                                @php
                                    $nilai = $detail->nilai;
                                    $classNilai = 'bb';
                                    $labelNilai = 'BB';
                                    if($nilai == 1) { $classNilai = 'bb'; $labelNilai = 'BB'; }
                                    elseif($nilai == 2) { $classNilai = 'mb'; $labelNilai = 'MB'; }
                                    elseif($nilai == 3) { $classNilai = 'bsh'; $labelNilai = 'BSH'; }
                                    elseif($nilai == 4) { $classNilai = 'bsb'; $labelNilai = 'BSB'; }
                                @endphp
                                <span class="badge-nilai {{ $classNilai }}">
                                    {{ $labelNilai }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="bi bi-inbox" style="font-size: 24px; display: block;"></i>
                                Belum ada detail instrumen penilaian
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Informasi jumlah instrumen -->
            <div class="mt-2 text-muted" style="font-size: 13px;">
                <i class="bi bi-info-circle"></i>
                Total {{ $penilaian->detail->count() }} instrumen yang dinilai
            </div>
        </div>

        <!-- ===== ACTION BUTTONS ===== -->
        <div class="btn-group-action">
            <a href="{{ route('penilaian.index') }}" class="btn-action btn-kembali">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
            <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn-action btn-edit">
                <i class="bi bi-pencil-square"></i>
                Edit Penilaian
            </a>
            <button onclick="window.print()" class="btn-action btn-print">
                <i class="bi bi-printer"></i>
                Cetak Laporan
            </button>
        </div>

    </div>
    <!-- ===== FOOTER UNTUK CETAK ===== -->
<div class="print-footer" style="display:none;">
    <div class="catatan">
        <strong>Catatan:</strong>
        <ul>
            <li>Laporan ini merupakan hasil penilaian perkembangan anak</li>
            <li>BB: Belum Berkembang, MB: Mulai Berkembang, BSH: Berkembang Sesuai Harapan, BSB: Berkembang Sangat Baik</li>
            <li>Laporan ini dicetak dari Sistem Informasi PAUD</li>
        </ul>
    </div>
    <div class="ttd">
        <div class="garis"></div>
        <div class="jabatan">Mengetahui,</div>
        <div class="nama">Kepala Sekolah</div>
        <div style="font-size:11px; color:#666;">PAUD / TK Negeri Pembina</div>
        <div style="font-size:13px; font-weight:700; margin-top:4px; color:#1a5276;">____________________</div>
        <div class="nip">NIP. ____________________</div>
    </div>
</div>

<!-- ===== WATERMARK UNTUK CETAK ===== -->
<div class="print-watermark" style="display:none;">DOKUMEN RESMI</div>

<!-- ===== COPYRIGHT UNTUK CETAK ===== -->
<div class="print-copyright" style="display:none;">
    © {{ date('Y') }} Sistem Penilaian Perkembangan Anak - PAUD / TK Negeri Pembina
</div>
</div>

@endsection