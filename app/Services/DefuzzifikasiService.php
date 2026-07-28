<?php

namespace App\Services;

class DefuzzifikasiService
{
    protected $agregasi;

    public function __construct()
    {
        $this->agregasi = new AgregasiService();
    }

    public function centroid($alpha)
    {
        $x = [];
        $mu = [];

        for ($i = 25; $i <= 100; $i += 0.01) {
            $x[] = round($i, 2);
            $mu[] = $this->agregasi->muAgg($i, $alpha);
        }

        $atas = $this->trapezoidMultiply($x, $mu);
        $bawah = $this->trapezoid($mu, $x);

        if ($bawah == 0) {
            return 0;
        }

        return round($atas / $bawah, 3);
    }

    private function trapezoid($y, $x)
    {
        $hasil = 0;

        for ($i = 0; $i < count($y) - 1; $i++) {
            $hasil += (($y[$i] + $y[$i + 1]) / 2) * ($x[$i + 1] - $x[$i]);
        }

        return $hasil;
    }

    private function trapezoidMultiply($x, $mu)
    {
        $hasil = 0;

        for ($i = 0; $i < count($mu) - 1; $i++) {
            $y1 = $x[$i] * $mu[$i];
            $y2 = $x[$i + 1] * $mu[$i + 1];
            $hasil += (($y1 + $y2) / 2) * ($x[$i + 1] - $x[$i]);
        }

        return $hasil;
    }

    public function kategori($nilai)
    {
        if ($nilai < 47.5)
            return "BB";

        if ($nilai < 62.5)
            return "MB";

        if ($nilai < 77.5)
            return "BSH";

        return "BSB";
    }
}