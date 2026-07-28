<?php

namespace App\Services;

class AgregasiService
{
    public function proses($aturanAktif)
    {

        $alpha=[

            'BB'=>0,

            'MB'=>0,

            'BSH'=>0,

            'BSB'=>0

        ];

        foreach($aturanAktif as $rule){

            $out=$rule['output'];

            if($rule['alpha']>$alpha[$out]){

                $alpha[$out]=$rule['alpha'];

            }

        }

        return $alpha;

    }

    public function muAgg($y,$alpha)
    {

        $m=new MembershipService();

        $nilai=[];

        foreach($alpha as $nama=>$a){

            if($a>0){

                switch($nama){

                    case 'BB':
                        $mu=$m->muBB($y);
                        break;

                    case 'MB':
                        $mu=$m->muMB($y);
                        break;

                    case 'BSH':
                        $mu=$m->muBSH($y);
                        break;

                    default:
                        $mu=$m->muBSB($y);

                }

                $nilai[]=min($mu,$a);

            }

        }

        if(empty($nilai))
            return 0;

        return max($nilai);

    }

}