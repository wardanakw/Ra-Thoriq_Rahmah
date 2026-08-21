@extends('layouts.app')

@section('content')

<style>
    /* ============================
           PENILAIAN STYLE
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
        border-left: 5px solid #FF6B6B;
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
        color: #FF6B6B;
        font-size: 28px;
    }

    .page-header .breadcrumb-custom {
        font-size: 14px;
        color: #7F8C8D;
    }

    .page-header .breadcrumb-custom a {
        color: #FF6B6B;
        text-decoration: none;
        font-weight: 600;
    }

    .page-header .breadcrumb-custom a:hover {
        text-decoration: underline;
    }

    /* ===== CARD ===== */
    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 50%, #FFB3B3 100%);
        padding: 18px 25px;
        border-bottom: 4px solid #FFE66D;
    }

    .card-header h4 {
        color: white;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        margin: 0;
        font-size: 22px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header h4 i {
        color: #FFE66D;
        font-size: 24px;
    }

    .card-header h4 small {
        font-size: 14px;
        font-weight: 400;
        opacity: 0.9;
        display: block;
        margin-top: 2px;
    }

    .card-header h4 small i {
        color: #FFE66D;
        font-size: 14px;
    }

    .card-body {
        background: #FFF8F0;
        padding: 25px;
    }

    /* ===== FORM ELEMENTS ===== */
    .form-select {
        border-radius: 12px;
        border: 2px solid #FFD93D;
        padding: 12px 20px;
        font-size: 15px;
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
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 8px;
        display: block;
    }

    .label-murid i {
        margin-right: 8px;
    }

    /* ===== SECTION TITLES ===== */
    .section-title {
        background: linear-gradient(135deg, #FFE66D 0%, #FFD93D 100%);
        padding: 12px 20px;
        border-radius: 12px;
        color: #4A4A4A;
        font-weight: 700;
        font-size: 17px;
        margin-top: 30px;
        margin-bottom: 20px;
        border-left: 5px solid #FF6B6B;
        box-shadow: 0 3px 10px rgba(255, 107, 107, 0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #FF6B6B;
        font-size: 20px;
    }

    /* ===== TABLE ===== */
    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    .table {
        margin-bottom: 0;
        background-color: white;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background: linear-gradient(135deg, #A8E6CF 0%, #88D8B0 100%);
        color: #2C3E50;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table thead th {
        padding: 14px 10px;
        border: none;
        text-align: center;
        vertical-align: middle;
        font-size: 12px;
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

    .table tbody tr:last-child {
        border-bottom: none;
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
        border-bottom: 1px solid #F0F0F0;
    }

    .table tbody td:first-child {
        font-weight: 700;
        color: #FF6B6B;
        text-align: center;
        font-size: 15px;
    }

    .table tbody td:not(:first-child):not(:nth-child(2)) {
        text-align: center;
    }

    /* ===== RADIO BUTTON ===== */
    .table tbody input[type="radio"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #FF6B6B;
        transition: all 0.2s ease;
    }

    .table tbody input[type="radio"]:hover {
        transform: scale(1.2);
    }

    .table tbody input[type="radio"]:checked {
        transform: scale(1.15);
    }

    /* Radio header labels */
    .table thead th:not(:first-child):not(:nth-child(2)) {
        color: #2C3E50;
        font-weight: 700;
        font-size: 12px;
        background: rgba(255,255,255,0.3);
        border-radius: 8px;
        padding: 6px 5px;
    }

    /* ===== BUTTON ===== */
    .btn-simpan {
        background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
        color: white;
        border: none;
        padding: 15px 40px;
        font-size: 18px;
        font-weight: 700;
        border-radius: 50px;
        box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-simpan:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(255, 107, 107, 0.4);
        background: linear-gradient(135deg, #FF5252 0%, #FF6B6B 100%);
        color: white;
    }

    .btn-simpan i {
        font-size: 20px;
    }

    /* ===== INFO & LEGEND ===== */
    .info-tip {
        background: #FFE66D;
        padding: 12px 18px;
        border-radius: 12px;
        font-size: 14px;
        color: #4A4A4A;
        margin-bottom: 20px;
        border-left: 4px solid #FF6B6B;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-tip i {
        color: #FF6B6B;
        font-size: 20px;
    }

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
        font-size: 13px;
        color: #4A4A4A;
        font-weight: 600;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #ddd;
        flex-shrink: 0;
    }

    .legend-color.bb { background: #FFE5E5; }
    .legend-color.mb { background: #FFF3CD; }
    .legend-color.bsh { background: #D4EDDA; }
    .legend-color.bsb { background: #C3E6CB; }

    /* ===== ANIMATIONS ===== */
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

        .card-body {
            padding: 20px;
        }

        .table thead th {
            font-size: 10px;
            padding: 10px 5px;
        }

        .table tbody td {
            font-size: 12px;
            padding: 8px 5px;
        }

        .table tbody input[type="radio"] {
            width: 18px;
            height: 18px;
        }

        .section-title {
            font-size: 15px;
            padding: 10px 15px;
        }

        .btn-simpan {
            font-size: 16px;
            padding: 12px 20px;
        }
    }

    @media (max-width: 768px) {
        .page-header h4 {
            font-size: 16px;
        }

        .card-header h4 {
            font-size: 18px;
        }

        .card-body {
            padding: 15px;
        }

        .table thead th {
            font-size: 9px;
            padding: 8px 4px;
        }

        .table tbody td {
            font-size: 11px;
            padding: 6px 4px;
        }

        .table tbody input[type="radio"] {
            width: 16px;
            height: 16px;
        }

        .section-title {
            font-size: 13px;
            padding: 8px 12px;
            margin-top: 20px;
        }

        .section-title i {
            font-size: 16px;
        }

        .btn-simpan {
            font-size: 14px;
            padding: 10px 15px;
        }

        .legend-box {
            padding: 12px 15px;
            gap: 12px;
        }

        .legend-item {
            font-size: 12px;
        }

        .info-tip {
            font-size: 13px;
            padding: 10px 15px;
        }
    }

    @media (max-width: 576px) {
        .page-header h4 {
            font-size: 15px;
        }

        .card-header h4 {
            font-size: 16px;
        }

        .card-header h4 small {
            font-size: 12px;
        }

        .card-body {
            padding: 12px;
        }

        .table thead th {
            font-size: 8px;
            padding: 6px 3px;
        }

        .table tbody td {
            font-size: 10px;
            padding: 5px 3px;
        }

        .table tbody td:first-child {
            font-size: 12px;
        }

        .table tbody input[type="radio"] {
            width: 14px;
            height: 14px;
        }

        .section-title {
            font-size: 12px;
            padding: 6px 10px;
            margin-top: 15px;
        }

        .section-title i {
            font-size: 14px;
        }

        .btn-simpan {
            font-size: 13px;
            padding: 8px 12px;
        }

        .legend-box {
            padding: 10px 12px;
            gap: 8px;
        }

        .legend-item {
            font-size: 11px;
        }

        .legend-color {
            width: 16px;
            height: 16px;
        }

        .info-tip {
            font-size: 12px;
            padding: 8px 12px;
        }
    }
</style>

<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <h4>
        <i class="fas fa-star"></i>
        Penilaian Perkembangan Anak
    </h4>
    <div class="breadcrumb-custom">
        <i class="bi bi-house"></i>
        <a href="{{ auth()->user()?->role === 'admin' ? route('admin.dashboard') : route('guru.dashboard') }}">Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <a href="{{ route('penilaian.index') }}">Data Penilaian</a>
        <i class="bi bi-chevron-right" style="font-size: 12px;"></i>
        <span style="color: #27AE60; font-weight: 600;">Tambah</span>
    </div>
</div>

<!-- ===== CARD ===== -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>
                <i class="fas fa-star"></i>
                <div>
                    Form Penilaian Anak
                    <small>
                        <i class="fas fa-heart"></i> 
                        RA Thoriqur Rahmah
                    </small>
                </div>
            </h4>
        </div>

        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('penilaian.store') }}" method="POST" novalidate id="formPenilaian">
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

                <!-- Hidden inputs -->
                <input type="hidden" name="guru_id" value="{{ auth()->id() }}">
                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                <!-- ===== AGAMA DAN BUDI PEKERTI ===== -->
                <div class="section-title">
                    <i class="fas fa-hands-praying"></i> 
                    Nilai Agama dan Budi Pekerti
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
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BB" required></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="MB"></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BSH"></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BSB"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ===== JATI DIRI ===== -->
                <div class="section-title">
                    <i class="fas fa-child"></i> 
                    Jati Diri
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
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BB" required></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="MB"></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BSH"></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BSB"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ===== STEAM / LITERASI ===== -->
                <div class="section-title">
                    <i class="fas fa-book-open"></i> 
                    Dasar-dasar Literasi, Matematika, Sains, Teknologi, Rekayasa, Seni dan Bahasa
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
                            @foreach($steam as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BB" required></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="MB"></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BSH"></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BSB"></td>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formPenilaian');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];
        let hasError = false;

        // Validasi setiap kelompok indikator
        const sections = ['agama', 'jati', 'steam'];
        sections.forEach(section => {
            const radios = document.querySelectorAll(`input[name^="${section}["]`);
            
            // Kelompokkan berdasarkan indikator (ambil nama unik)
            const groups = {};
            radios.forEach(radio => {
                const name = radio.getAttribute('name');
                if (!groups[name]) {
                    groups[name] = [];
                }
                groups[name].push(radio);
            });

            // Cek setiap kelompok
            for (const [name, group] of Object.entries(groups)) {
                const checked = group.some(radio => radio.checked);
                if (!checked) {
                    isValid = false;
                    hasError = true;
                    // Highlight row yang belum diisi
                    const row = group[0].closest('tr');
                    if (row) {
                        row.style.backgroundColor = '#FFF0F0';
                        row.style.borderLeft = '3px solid #E74C3C';
                    }
                }
            }
        });

        // Validasi murid
        const muridSelect = document.querySelector('select[name="murid_id"]');
        if (!muridSelect.value) {
            isValid = false;
            errorMessages.push('Silakan pilih murid terlebih dahulu');
            muridSelect.style.borderColor = '#E74C3C';
            muridSelect.style.boxShadow = '0 0 0 0.2rem rgba(231, 76, 60, 0.25)';
        }

        if (!isValid) {
            e.preventDefault();
            
            // Hapus highlight setelah 3 detik
            setTimeout(() => {
                document.querySelectorAll('tr[style*="background-color: rgb(255, 240, 240)"]').forEach(row => {
                    row.style.backgroundColor = '';
                    row.style.borderLeft = '';
                });
                if (muridSelect) {
                    muridSelect.style.borderColor = '';
                    muridSelect.style.boxShadow = '';
                }
            }, 3000);

            // Tampilkan pesan error
            if (hasError) {
                alert('⚠️ Mohon lengkapi semua indikator penilaian!\n\n' + 
                      'Pastikan setiap indikator telah diberi nilai (BB, MB, BSH, atau BSB).\n' +
                      'Bagian yang belum diisi akan diberi highlight merah.');
            } else if (errorMessages.length > 0) {
                alert('⚠️ ' + errorMessages.join('\n'));
            }
        }
    });

    // Reset highlight saat radio di klik
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const row = this.closest('tr');
            if (row) {
                row.style.backgroundColor = '';
                row.style.borderLeft = '';
            }
        });
    });
});
</script>
@endpush