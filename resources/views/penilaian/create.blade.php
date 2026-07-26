@extends('layouts.app')

@section('content')

<style>
    /* Warna ceria untuk TK */
    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.15);
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
        font-size: 24px;
        letter-spacing: 1px;
    }

    .card-header h4 i {
        margin-right: 10px;
    }

    .card-body {
        background: #FFF8F0;
        padding: 30px;
    }

    /* Form Select */
    .form-select {
        border-radius: 15px;
        border: 2px solid #FFD93D;
        padding: 12px 20px;
        font-size: 16px;
        background-color: white;
        transition: all 0.3s ease;
        color: #4A4A4A;
        font-weight: 500;
    }

    .form-select:focus {
        border-color: #FF6B6B;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        outline: none;
    }

    .form-select:hover {
        border-color: #FF8E8E;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.15);
    }

    .label-murid {
        color: #FF6B6B;
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 8px;
        display: block;
    }

    /* Section Titles */
    .section-title {
        background: linear-gradient(135deg, #FFE66D 0%, #FFD93D 100%);
        padding: 12px 20px;
        border-radius: 15px;
        color: #4A4A4A;
        font-weight: 700;
        font-size: 18px;
        margin-top: 30px;
        margin-bottom: 20px;
        border-left: 5px solid #FF6B6B;
        box-shadow: 0 3px 10px rgba(255, 107, 107, 0.1);
    }

    .section-title i {
        margin-right: 10px;
        color: #FF6B6B;
    }

    /* Table Styling */
    .table {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        background-color: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background: linear-gradient(135deg, #A8E6CF 0%, #88D8B0 100%);
        color: #2C3E50;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table thead th {
        padding: 15px 10px;
        border: none;
        text-align: center;
        vertical-align: middle;
        font-size: 13px;
    }

    .table thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .table thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #F0F0F0;
    }

    .table tbody tr:hover {
        background-color: #FFF5F5;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.08);
    }

    .table tbody td {
        padding: 12px 10px;
        vertical-align: middle;
        font-size: 14px;
        color: #4A4A4A;
        border: none;
    }

    .table tbody td:first-child {
        font-weight: 700;
        color: #FF6B6B;
        text-align: center;
        font-size: 16px;
    }

    .table tbody td:not(:first-child):not(:nth-child(2)) {
        text-align: center;
    }

    /* Radio Button Styling */
    .table tbody input[type="radio"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #FF6B6B;
        transition: all 0.2s ease;
        position: relative;
    }

    .table tbody input[type="radio"]:hover {
        transform: scale(1.2);
    }

    .table tbody input[type="radio"]:checked {
        transform: scale(1.15);
    }

    /* Label for Radio Buttons (BB, MB, BSH, BSB) */
    .table thead th:not(:first-child):not(:nth-child(2)) {
        color: #2C3E50;
        font-weight: 700;
        font-size: 13px;
        background: rgba(255,255,255,0.3);
        border-radius: 8px;
        padding: 8px 5px;
    }

    /* Tombol Simpan */
    .btn-simpan {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
        color: white;
        border: none;
        padding: 15px 40px;
        font-size: 20px;
        font-weight: 700;
        border-radius: 50px;
        box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
        letter-spacing: 1px;
    }

    .btn-simpan:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(255, 107, 107, 0.4);
        background: linear-gradient(135deg, #FF5252 0%, #FF6B6B 100%);
        color: white;
    }

    .btn-simpan i {
        margin-right: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-body {
            padding: 15px;
        }

        .table thead th {
            font-size: 11px;
            padding: 10px 5px;
        }

        .table tbody td {
            font-size: 12px;
            padding: 8px 5px;
        }

        .table tbody input[type="radio"] {
            width: 16px;
            height: 16px;
        }

        .section-title {
            font-size: 16px;
            padding: 10px 15px;
        }

        .btn-simpan {
            font-size: 16px;
            padding: 12px 20px;
        }

        .card-header h4 {
            font-size: 18px;
        }
    }

    /* Animasi untuk loading */
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

    .card {
        animation: fadeInUp 0.6s ease;
    }

    /* Tooltip info */
    .info-tip {
        background: #FFE66D;
        padding: 10px 15px;
        border-radius: 10px;
        font-size: 14px;
        color: #4A4A4A;
        margin-bottom: 20px;
        border-left: 4px solid #FF6B6B;
    }

    .info-tip i {
        color: #FF6B6B;
        margin-right: 8px;
    }

    /* Keterangan nilai */
    .legend-box {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        background: white;
        padding: 15px 20px;
        border-radius: 15px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #4A4A4A;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .legend-color.bb { background: #FFE5E5; }
    .legend-color.mb { background: #FFF3CD; }
    .legend-color.bsh { background: #D4EDDA; }
    .legend-color.bsb { background: #C3E6CB; }
</style>

<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>
                <i class="fas fa-star"></i> 
                Penilaian Perkembangan Anak
                <small style="font-size: 14px; opacity: 0.9; display: block; margin-top: 5px;">
                    <i class="fas fa-heart" style="color: #FFE66D;"></i> 
                    RA Thoriqur Rahmah
                </small>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('penilaian.store') }}" method="POST">
                @csrf

                <!-- Informasi Penting -->
                <div class="info-tip">
                    <i class="fas fa-info-circle"></i> 
                    Pilih murid dan berikan penilaian untuk setiap indikator perkembangan. 
                    Pastikan semua indikator telah dinilai sebelum menyimpan.
                </div>

                <!-- Legend -->
                <div class="legend-box">
                    <span class="legend-item">
                        <span class="legend-color bb"></span> BB (Belum Berkembang)
                    </span>
                    <span class="legend-item">
                        <span class="legend-color mb"></span> MB (Mulai Berkembang)
                    </span>
                    <span class="legend-item">
                        <span class="legend-color bsh"></span> BSH (Berkembang Sesuai Harapan)
                    </span>
                    <span class="legend-item">
                        <span class="legend-color bsb"></span> BSB (Berkembang Sangat Baik)
                    </span>
                </div>

                <!-- Pilih Murid -->
                <div class="mb-4">
                    <label class="label-murid">
                        <i class="fas fa-user-graduate"></i> Pilih Nama Murid
                    </label>
                    <select name="murid_id" class="form-select" required>
                        <option value="">-- Pilih Murid --</option>
                        @foreach($murid as $m)
                            <option value="{{ $m->id }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Agama dan Budi Pekerti -->
                <div class="section-title">
                    <i class="fas fa-hands-praying"></i> Nilai Agama dan Budi Pekerti
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Indikator</th>
                                <th width="60">BB</th>
                                <th width="60">MB</th>
                                <th width="60">BSH</th>
                                <th width="60">BSB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agama as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="1" required></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="2"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="3"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="4"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Jati Diri -->
                <div class="section-title">
                    <i class="fas fa-child"></i> Jati Diri
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Indikator</th>
                                <th width="60">BB</th>
                                <th width="60">MB</th>
                                <th width="60">BSH</th>
                                <th width="60">BSB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jati as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="1" required></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="2"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="3"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="4"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Literasi, Matematika, Sains, dll -->
                <div class="section-title">
                    <i class="fas fa-book-open"></i> Dasar-dasar Literasi, Matematika, Sains, Teknologi, Rekayasa, Seni dan Bahasa
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Indikator</th>
                                <th width="60">BB</th>
                                <th width="60">MB</th>
                                <th width="60">BSH</th>
                                <th width="60">BSB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($literasi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="1" required></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="2"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="3"></td>
                                    <td><input type="radio" name="indikator[{{ $item->id }}]" value="4"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save"></i> Simpan Penilaian
                </button>
            </form>
        </div>
    </div>
</div>

@endsection