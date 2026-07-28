<?php

namespace App\Services;

class MembershipService
{
    public function muBB($x)
    {
        if ($x <= 25) {
            return 1.0;
        } elseif ($x < 55) {
            return max(min((55 - $x) / (55 - 40), 1.0), 0.0);
        }

        return 0.0;
    }

    public function muMB($x)
    {
        if ($x <= 40 || $x >= 70) {
            return 0.0;
        } elseif ($x <= 55) {
            return ($x - 40) / (55 - 40);
        }

        return (70 - $x) / (70 - 55);
    }

    public function muBSH($x)
    {
        if ($x <= 55 || $x >= 85) {
            return 0.0;
        } elseif ($x <= 70) {
            return ($x - 55) / (70 - 55);
        }

        return (85 - $x) / (85 - 70);
    }

    public function muBSB($x)
    {
        if ($x <= 70) {
            return 0.0;
        } elseif ($x < 85) {
            return ($x - 70) / (85 - 70);
        }

        return 1.0;
    }

    public function fuzzifikasi($nilai)
    {
        return [

            'BB' => round($this->muBB($nilai),3),

            'MB' => round($this->muMB($nilai),3),

            'BSH' => round($this->muBSH($nilai),3),

            'BSB' => round($this->muBSB($nilai),3),

        ];
    }
}