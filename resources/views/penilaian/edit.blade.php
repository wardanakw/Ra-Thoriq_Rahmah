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

    .card-body {
        background: #FFF8F0;
        padding: 30px;
    }

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

    .label-murid {
        color: #FF6B6B;
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 8px;
        display: block;
    }

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
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #F0F0F0;
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

    .table tbody input[type="radio"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #FF6B6B;
    }

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

    .info-tip {
        background: #FFE66D;
        padding: 10px 15px;
        border-radius: 10px;
        font-size: 14px;
        color: #4A4A4A;
        margin-bottom: 20px;
        border-left: 4px solid #FF6B6B;
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
        <span style="color: #27AE60; font-weight: 600;">Edit</span>
    </div>
</div>
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>
                <i class="fas fa-edit"></i>
                Edit Penilaian Perkembangan Anak
                <small style="font-size: 14px; opacity: 0.9; display: block; margin-top: 5px;">
                    <i class="fas fa-heart" style="color: #FFE66D;"></i>
                    RA Thoriqur Rahmah
                </small>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="info-tip">
                    <i class="fas fa-info-circle"></i>
                    Perbarui penilaian murid dengan memilih nilai yang sesuai untuk setiap indikator.
                </div>

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

                <div class="mb-4">
                    <label class="label-murid">
                        <i class="fas fa-user-graduate"></i> Pilih Nama Murid
                    </label>
                    <select name="murid_id" class="form-select" required>
                        <option value="">-- Pilih Murid --</option>
                        @foreach($murid as $m)
                            <option value="{{ $m->id }}" {{ $penilaian->murid_id == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>

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
                                @php
                                    $selectedValue = $penilaian->detail->where('indikator_id', $item->id)->first()?->nilai;
                                    $selectedLabel = null;
                                    if ($selectedValue == 1) {
                                        $selectedLabel = 'BB';
                                    } elseif ($selectedValue == 2) {
                                        $selectedLabel = 'MB';
                                    } elseif ($selectedValue == 3) {
                                        $selectedLabel = 'BSH';
                                    } elseif ($selectedValue == 4) {
                                        $selectedLabel = 'BSB';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BB" {{ $selectedLabel == 'BB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="MB" {{ $selectedLabel == 'MB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BSH" {{ $selectedLabel == 'BSH' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="agama[{{ $item->id }}]" value="BSB" {{ $selectedLabel == 'BSB' ? 'checked' : '' }}></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
                                @php
                                    $selectedValue = $penilaian->detail->where('indikator_id', $item->id)->first()?->nilai;
                                    $selectedLabel = null;
                                    if ($selectedValue == 1) {
                                        $selectedLabel = 'BB';
                                    } elseif ($selectedValue == 2) {
                                        $selectedLabel = 'MB';
                                    } elseif ($selectedValue == 3) {
                                        $selectedLabel = 'BSH';
                                    } elseif ($selectedValue == 4) {
                                        $selectedLabel = 'BSB';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BB" {{ $selectedLabel == 'BB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="MB" {{ $selectedLabel == 'MB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BSH" {{ $selectedLabel == 'BSH' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="jati[{{ $item->id }}]" value="BSB" {{ $selectedLabel == 'BSB' ? 'checked' : '' }}></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
                            @foreach($steam as $item)
                                @php
                                    $selectedValue = $penilaian->detail->where('indikator_id', $item->id)->first()?->nilai;
                                    $selectedLabel = null;
                                    if ($selectedValue == 1) {
                                        $selectedLabel = 'BB';
                                    } elseif ($selectedValue == 2) {
                                        $selectedLabel = 'MB';
                                    } elseif ($selectedValue == 3) {
                                        $selectedLabel = 'BSH';
                                    } elseif ($selectedValue == 4) {
                                        $selectedLabel = 'BSB';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->indikator }}</td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BB" {{ $selectedLabel == 'BB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="MB" {{ $selectedLabel == 'MB' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BSH" {{ $selectedLabel == 'BSH' ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="steam[{{ $item->id }}]" value="BSB" {{ $selectedLabel == 'BSB' ? 'checked' : '' }}></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const radioGroups = document.querySelectorAll('input[type="radio"]');

    radioGroups.forEach(radio => {
        radio.removeAttribute('required');
    });

    form.addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        const sections = ['agama', 'jati', 'steam'];
        sections.forEach(section => {
            const radios = document.querySelectorAll(`input[name^="${section}["`);
            if (radios.length > 0) {
                const checked = Array.from(radios).some(radio => radio.checked);
                if (!checked) {
                    isValid = false;
                    errorMessages.push(`Silakan isi semua indikator ${section}`);
                }
            }
        });

        const muridSelect = document.querySelector('select[name="murid_id"]');
        if (!muridSelect.value) {
            isValid = false;
            errorMessages.push('Silakan pilih murid');
        }

        if (!isValid) {
            e.preventDefault();
            alert(errorMessages.join('\n'));
        }
    });
});
</script>
@endsection
@endsection
