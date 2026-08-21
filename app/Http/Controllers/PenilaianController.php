<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Indikator;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenilaian;
use App\Services\MamdaniService;

class PenilaianController extends Controller
{
    protected $mamdaniService;

    public function __construct(MamdaniService $mamdaniService)
    {
        $this->mamdaniService = $mamdaniService;
    }

    public function index()
    {
        $penilaian = Penilaian::with('murid')->latest()->paginate(10);
        return view('penilaian.index', compact('penilaian'));
    }

    public function create()
    {
        $murid = Murid::orderBy('nama')->get();
        $agama = Indikator::where('kode', 'LIKE', 'A%')->orderBy('urutan')->get();
        $jati = Indikator::where('kode', 'LIKE', 'J%')->orderBy('urutan')->get();
        $steam = Indikator::where('kode', 'LIKE', 'L%')->orderBy('urutan')->get();

        return view('penilaian.create', compact('murid', 'agama', 'jati', 'steam'));
    }

    public function show(Penilaian $penilaian)
    {
        $penilaian->load(['murid', 'detail.indikator']);

        return view('penilaian.show', compact('penilaian'));
    }

    public function edit(Penilaian $penilaian)
    {
        $penilaian->load(['murid', 'detail.indikator']);
        $murid = Murid::orderBy('nama')->get();
        $agama = Indikator::where('kode', 'LIKE', 'A%')->orderBy('urutan')->get();
        $jati = Indikator::where('kode', 'LIKE', 'J%')->orderBy('urutan')->get();
        $steam = Indikator::where('kode', 'LIKE', 'L%')->orderBy('urutan')->get();

        return view('penilaian.edit', compact('penilaian', 'murid', 'agama', 'jati', 'steam'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,id',
            'tanggal' => 'required|date',
            'agama' => 'required|array|min:1',
            'jati' => 'required|array|min:1',
            'steam' => 'required|array|min:1',
        ], [
            'murid_id.required' => 'Silakan pilih murid',
            'tanggal.required' => 'Tanggal penilaian wajib diisi',
            'tanggal.date' => 'Tanggal penilaian tidak valid',
            'agama.required' => 'Silakan isi semua indikator Agama',
            'jati.required' => 'Silakan isi semua indikator Jati Diri',
            'steam.required' => 'Silakan isi semua indikator STEAM',
        ]);

        $penilaianSudahAda = Penilaian::where('murid_id', $request->murid_id)
            ->whereDate('tanggal', $request->tanggal)
            ->exists();

        if ($penilaianSudahAda) {
            return back()
                ->withInput()
                ->with('error', 'Penilaian untuk murid tersebut pada tanggal ini sudah ada. Silakan gunakan tanggal yang berbeda.');
        }

        DB::beginTransaction();

        try {
            $penilaian->detail()->delete();

            $agamaValues = [];
            foreach ($request->input('agama', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $agamaValues[] = $score;
            }

            $jatiValues = [];
            foreach ($request->input('jati', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $jatiValues[] = $score;
            }

            $steamValues = [];
            foreach ($request->input('steam', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $steamValues[] = $score;
            }

            $nilaiAgama = $this->normalisasi($agamaValues);
            $nilaiJati = $this->normalisasi($jatiValues);
            $nilaiSteam = $this->normalisasi($steamValues);

            $hasilMamdani = $this->mamdaniService->proses($nilaiAgama, $nilaiJati, $nilaiSteam);
            $hasilFuzzy = round((float) $hasilMamdani['hasil'], 3);
            $kategori = (string) $hasilMamdani['kategori'];

            $penilaian->update([
                'murid_id' => $request->murid_id,
                'agama' => (float) $nilaiAgama,
                'jati_diri' => (float) $nilaiJati,
                'steam' => (float) $nilaiSteam,
                'hasil_fuzzy' => $hasilFuzzy,
                'kategori' => $kategori,
            ]);

            DB::commit();

            return redirect()
                ->route('penilaian.index')
                ->with('success', 'Penilaian berhasil diperbarui untuk ' . $penilaian->murid->nama);
        } catch (\Exception $e) {
            DB::rollback();
            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui penilaian: ' . $e->getMessage());
        }
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->detail()->delete();
        $penilaian->delete();

        return redirect()->route('penilaian.index')
            ->with('success', 'Penilaian berhasil dihapus.');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'murid_id' => 'required|exists:murid,id',
            'tanggal' => 'required|date',
            'agama' => 'required|array|min:1',
            'jati' => 'required|array|min:1',
            'steam' => 'required|array|min:1',
        ], [
            'murid_id.required' => 'Silakan pilih murid',
            'tanggal.required' => 'Tanggal penilaian wajib diisi',
            'tanggal.date' => 'Tanggal penilaian tidak valid',
            'agama.required' => 'Silakan isi semua indikator Agama',
            'jati.required' => 'Silakan isi semua indikator Jati Diri',
            'steam.required' => 'Silakan isi semua indikator STEAM',
        ]);

        $penilaianSudahAda = Penilaian::where('murid_id', $request->murid_id)
            ->whereDate('tanggal', $request->tanggal)
            ->exists();

        if ($penilaianSudahAda) {
            return back()
                ->withInput()
                ->with('error', 'Penilaian untuk murid tersebut pada tanggal ini sudah ada. Silakan gunakan tanggal yang berbeda.');
        }

        DB::beginTransaction();

        try {
            // Buat penilaian utama
            $penilaian = Penilaian::create([
                'murid_id' => $request->murid_id,
                'guru_id' => auth()->id(),
                'tanggal' => $request->tanggal,
                'agama' => 0,
                'jati_diri' => 0,
                'steam' => 0,
                'hasil_fuzzy' => '', // String kosong
                'kategori' => '', // String kosong
            ]);

            // Proses Agama
            $agamaValues = [];
            foreach ($request->input('agama', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $agamaValues[] = $score;
            }

            // Proses Jati Diri
            $jatiValues = [];
            foreach ($request->input('jati', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $jatiValues[] = $score;
            }

            // Proses STEAM
            $steamValues = [];
            foreach ($request->input('steam', []) as $indikator_id => $nilai) {
                $score = $this->mapValueToScore($nilai);
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'indikator_id' => $indikator_id,
                    'nilai' => $score,
                ]);
                $steamValues[] = $score;
            }

            // Hitung nilai rata-rata dan normalisasi
            $nilaiAgama = $this->normalisasi($agamaValues);
            $nilaiJati = $this->normalisasi($jatiValues);
            $nilaiSteam = $this->normalisasi($steamValues);

            // Hitung hasil fuzzy numerik melalui Mamdani
            $hasilMamdani = $this->mamdaniService->proses($nilaiAgama, $nilaiJati, $nilaiSteam);
            $hasilFuzzy = round((float) $hasilMamdani['hasil'], 3);
            $kategori = (string) $hasilMamdani['kategori'];

            // Update penilaian dengan hasil numerik
            $penilaian->update([
                'agama' => (float) $nilaiAgama,
                'jati_diri' => (float) $nilaiJati,
                'steam' => (float) $nilaiSteam,
                'hasil_fuzzy' => $hasilFuzzy,
                'kategori' => $kategori,
            ]);

            DB::commit();

            return redirect()
                ->route('penilaian.index')
                ->with('success', 'Penilaian berhasil disimpan untuk ' . $penilaian->murid->nama);

        } catch (\Exception $e) {
            DB::rollback();
            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan penilaian: ' . $e->getMessage());
        }
    }

    private function normalisasi($nilai)
    {
        // Filter nilai yang valid
        $nilai = array_filter($nilai, fn($item) => is_numeric($item) && $item > 0);
        
        if (empty($nilai)) {
            return 0;
        }

        $rata = array_sum($nilai) / count($nilai);
        // Normalisasi ke skala 0-100
        return round(($rata / 4) * 100, 2);
    }

    private function mapValueToScore($value)
    {
        return match (strtoupper((string) $value)) {
            'BB' => 1,
            'MB' => 2,
            'BSH' => 3,
            'BSB' => 4,
            default => (int) $value,
        };
    }

    private function convertScoreToFuzzy($score)
    {
        // Konversi nilai 0-100 ke fuzzy label
        if ($score >= 75) return 'BSB';
        if ($score >= 50) return 'BSH';
        if ($score >= 25) return 'MB';
        return 'BB';
    }

    private function applyRules($rules, $agama, $jati, $steam)
    {
        // Cari rule yang cocok
        foreach ($rules as $rule) {
            if ($rule['agama'] === $agama && 
                $rule['jati'] === $jati && 
                $rule['steam'] === $steam) {
                return $rule['output'];
            }
        }

        // Jika tidak ada rule yang cocok, gunakan logika sederhana
        return $this->fallbackLogic($agama, $jati, $steam);
    }

    private function fallbackLogic($agama, $jati, $steam)
    {
        $values = ['BB' => 1, 'MB' => 2, 'BSH' => 3, 'BSB' => 4];
        $avg = ($values[$agama] + $values[$jati] + $values[$steam]) / 3;
        
        if ($avg >= 3.5) return 'BSB';
        if ($avg >= 2.5) return 'BSH';
        if ($avg >= 1.5) return 'MB';
        return 'BB';
    }

    private function getKategori($hasilFuzzy)
    {
        $kategori = [
            'BB' => 'Belum Berkembang',
            'MB' => 'Mulai Berkembang',
            'BSH' => 'Berkembang Sesuai Harapan',
            'BSB' => 'Berkembang Sangat Baik'
        ];
        return $kategori[$hasilFuzzy] ?? 'Belum Berkembang';
    }
}
