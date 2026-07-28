<?php

namespace App\Services;

class MamdaniService
{

    protected $membership;
    protected $fuzzifikasi;
    protected $rule;
    protected $inferensi;
    protected $agregasi;
    protected $defuzzy;

    public function __construct()
    {
        $this->membership = new MembershipService();
        $this->fuzzifikasi = new FuzzifikasiService();
        $this->rule = new RuleService();
        $this->inferensi = new InferensiService();
        $this->agregasi = new AgregasiService();
        $this->defuzzy = new DefuzzifikasiService();
    }

    public function proses($agama,$jati,$steam)
    {

        $fuzzy = $this->fuzzifikasi
            ->proses($agama,$jati,$steam);

        $rules = $this->rule
            ->generateRules();

        $aturanAktif = $this->inferensi
            ->proses(
                $fuzzy['agama'],
                $fuzzy['jati_diri'],
                $fuzzy['steam'],
                $rules
            );

        $alpha = $this->agregasi
            ->proses($aturanAktif);

        $crisp = $this->defuzzy
            ->centroid($alpha);

        return [
            'fuzzifikasi' => $fuzzy,
            'aturan' => $aturanAktif,
            'alpha' => $alpha,
            'hasil' => $crisp,
            'kategori' => $this->defuzzy->kategori($crisp),
        ];

    }

    private function kategori($nilai)
    {
        if($nilai<=40){
            return 'BB';
        }

        if($nilai<=60){
            return 'MB';
        }

        if($nilai<=80){
            return 'BSH';
        }

        return 'BSB';
    }

}