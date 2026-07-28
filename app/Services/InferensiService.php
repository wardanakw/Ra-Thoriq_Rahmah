<?php

namespace App\Services;

class InferensiService
{
    public function proses($agama,$jati,$steam,$rules)
    {

        $aktif=[];

        foreach($rules as $i=>$rule){

            $mu1=$agama[$rule['agama']];

            $mu2=$jati[$rule['jati']];

            $mu3=$steam[$rule['steam']];

            $alpha=min($mu1,$mu2,$mu3);

            if($alpha>0){

                $aktif[]=[

                    'no'=>$i+1,

                    'agama'=>$rule['agama'],

                    'jati'=>$rule['jati'],

                    'steam'=>$rule['steam'],

                    'output'=>$rule['output'],

                    'alpha'=>$alpha

                ];

            }

        }

        return $aktif;

    }
}