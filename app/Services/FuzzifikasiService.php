<?php

namespace App\Services;

class FuzzifikasiService
{
    protected MembershipService $membership;

    public function __construct()
    {
        $this->membership = new MembershipService();
    }

    public function proses($agama, $jati, $steam)
    {
        return [

            'agama' => $this->membership->fuzzifikasi($agama),

            'jati_diri' => $this->membership->fuzzifikasi($jati),

            'steam' => $this->membership->fuzzifikasi($steam)

        ];
    }
}