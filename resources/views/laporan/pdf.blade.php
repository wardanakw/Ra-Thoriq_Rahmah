<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penilaian Perkembangan Anak</title>
    <style>
        /* ============================
               PDF LAPORAN STYLE
            ============================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            font-size: 11px;
            padding: 20px;
            color: #2C3E50;
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #2C3E50;
            padding-bottom: 15px;
        }

        .header .title {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a1a;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2px;
        }

        .header .subtitle {
            font-size: 14px;
            font-weight: 600;
            color: #2C3E50;
            letter-spacing: 1px;
        }

        .header .info {
            font-size: 11px;
            color: #7F8C8D;
            margin-top: 5px;
        }

        .header .info span {
            font-weight: 600;
            color: #2C3E50;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 10px;
        }

        table thead th {
            background: #2C3E50;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 9px;
            letter-spacing: 0.5px;
            padding: 8px 6px;
            border: 1px solid #2C3E50;
            text-align: center;
        }

        table tbody td {
            padding: 6px 6px;
            border: 1px solid #BDC3C7;
            text-align: center;
            vertical-align: middle;
        }

        table tbody tr:nth-child(even) {
            background: #F8F9FA;
        }

        table tbody tr:hover {
            background: #FFF5F5;
        }

        .table-no {
            width: 30px;
            font-weight: 700;
            color: #2C3E50;
        }

        .table-nama {
            text-align: left;
            font-weight: 600;
            padding-left: 10px !important;
        }

        .table-kelas {
            font-weight: 600;
        }

        .table-tanggal {
            font-size: 9px;
        }

        /* ===== BADGE KATEGORI ===== */
        .kategori-bb {
            color: #D63031;
            font-weight: 700;
        }

        .kategori-mb {
            color: #F39C12;
            font-weight: 700;
        }

        .kategori-bsh {
            color: #27AE60;
            font-weight: 700;
        }

        .kategori-bsb {
            color: #1E8449;
            font-weight: 700;
        }

        .kategori-belum {
            color: #7F8C8D;
            font-weight: 700;
        }

        /* ===== NILAI ===== */
        .nilai {
            font-weight: 600;
            color: #2C3E50;
        }

        .nilai-highlight {
            font-weight: 700;
            color: #E74C3C;
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding-top: 20px;
            border-top: 2px solid #BDC3C7;
        }

        .footer .left {
            font-size: 10px;
            color: #7F8C8D;
        }

        .footer .left strong {
            color: #2C3E50;
        }

        .footer .right {
            text-align: center;
            width: 250px;
        }

        .footer .right .city {
            font-size: 11px;
            font-weight: 600;
            color: #2C3E50;
        }

        .footer .right .signature {
            margin-top: 30px;
            padding-top: 10px;
        }

        .footer .right .signature .line {
            border-top: 1px solid #2C3E50;
            width: 200px;
            margin: 0 auto;
            padding-top: 5px;
        }

        .footer .right .signature .label {
            font-size: 10px;
            font-weight: 600;
            color: #2C3E50;
            margin-top: 5px;
        }

        /* ===== RESPONSIVE ===== */
        @media print {
            body {
                padding: 15px;
            }

            table thead th {
                background: #2C3E50 !important;
                color: #ffffff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            table tbody tr:nth-child(even) {
                background: #F8F9FA !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .header {
                border-bottom-color: #2C3E50;
            }

            .footer {
                border-top-color: #BDC3C7;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            body {
                padding: 10px;
                font-size: 9px;
            }

            .header .title {
                font-size: 14px;
            }

            .header .subtitle {
                font-size: 12px;
            }

            table {
                font-size: 8px;
            }

            table thead th {
                font-size: 7px;
                padding: 5px 3px;
            }

            table tbody td {
                padding: 4px 3px;
            }

            .footer .right {
                width: 180px;
            }

            .footer .right .signature .line {
                width: 150px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== HEADER ===== -->
    <div class="header">
        <div class="title">
            Laporan Penilaian Perkembangan Anak
        </div>
        <div class="subtitle">
            PAUD Ceria - RA .....................................
        </div>
        <div class="info">
            Periode: <span>
                @if(request('tanggal_awal') && request('tanggal_akhir'))
                    {{ \Carbon\Carbon::parse(request('tanggal_awal'))->isoFormat('D MMMM Y') }} - 
                    {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->isoFormat('D MMMM Y') }}
                @else
                    Semua Data
                @endif
            </span>
            @if(request('kelas'))
                | Kelas: <span>{{ request('kelas') }}</span>
            @endif
            @if(request('kategori'))
                | Kategori: <span>{{ request('kategori') }}</span>
            @endif
        </div>
    </div>

    <!-- ===== TABLE ===== -->
    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama Anak</th>
                <th width="50">Kelas</th>
                <th width="80">Tanggal</th>
                <th width="60">Agama</th>
                <th width="60">Jati Diri</th>
                <th width="60">Literasi</th>
                <th width="60">Fuzzy</th>
                <th width="70">Kategori</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $item)
            <tr>
                <td class="table-no">{{ $loop->iteration }}</td>
                <td class="table-nama">{{ $item->murid->nama }}</td>
                <td class="table-kelas">{{ $item->murid->kelas }}</td>
                <td class="table-tanggal">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD/MM/YYYY') }}</td>
                <td>
                    <span class="nilai">
                        {{ is_numeric($item->agama) ? number_format((float) $item->agama, 2) : '-' }}
                    </span>
                </td>
                <td>
                    <span class="nilai">
                        {{ is_numeric($item->jati_diri) ? number_format((float) $item->jati_diri, 2) : '-' }}
                    </span>
                </td>
                <td>
                    <span class="nilai">
                        {{ is_numeric($item->steam ?? $item->literasi ?? null) ? number_format((float) ($item->steam ?? $item->literasi), 2) : '-' }}
                    </span>
                </td>
                <td>
                    <span class="nilai-highlight">
                        {{ is_numeric($item->hasil_fuzzy) ? number_format((float) $item->hasil_fuzzy, 2) : ($item->hasil_fuzzy ?? '-') }}
                    </span>
                </td>
                <td>
                    @php
                        $kategori = $item->kategori ?? 'Belum';
                        $classKategori = 'kategori-belum';
                        if($kategori == 'BB') $classKategori = 'kategori-bb';
                        elseif($kategori == 'MB') $classKategori = 'kategori-mb';
                        elseif($kategori == 'BSH') $classKategori = 'kategori-bsh';
                        elseif($kategori == 'BSB') $classKategori = 'kategori-bsb';
                    @endphp
                    <span class="{{ $classKategori }}">
                        {{ $kategori }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align: center; padding: 20px; color: #7F8C8D;">
                    <strong>Belum ada data laporan</strong>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- ===== SUMMARY ===== -->
    @if($laporan->count() > 0)
    <div style="margin-top: 10px; font-size: 10px; color: #7F8C8D; text-align: right;">
        <strong>Total Data:</strong> {{ $laporan->count() }} laporan
    </div>
    @endif

    <!-- ===== FOOTER ===== -->
    <div class="footer">
        <div class="left">
            <strong>PAUD Ceria</strong><br>
            Sistem Penilaian Perkembangan Anak<br>
            <small>Dicetak pada: {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y, HH:mm') }}</small>
        </div>

        <div class="right">
            <div class="city">
                Bandung, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
            </div>
            <div class="signature">
                <div class="line"></div>
                <div class="label">
                    <strong>Kepala RA / Guru Kelas</strong>
                </div>
            </div>
        </div>
    </div>

</body>
</html>