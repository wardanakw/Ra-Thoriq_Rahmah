<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Indikator;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenilaian;


class PenilaianController extends Controller
{

    public function index()
    {

        $penilaian=Penilaian::with('murid')->latest()->paginate(10);

        return view('penilaian.index',compact('penilaian'));

    }

public function create()
{
    $murid = Murid::orderBy('nama')->get();

    $agama = Indikator::where('kode', 'LIKE', 'A%')->orderBy('urutan')->get();

    $jati = Indikator::where('kode', 'LIKE', 'J%')->orderBy('urutan')->get();

    $literasi = Indikator::where('kode', 'LIKE', 'L%')->orderBy('urutan')->get();

    return view(
        'penilaian.create',
        compact(
            'murid',
            'agama',
            'jati',
            'literasi'
        )
    );
}

    public function store(Request $request)
{

    $request->validate([

        'murid_id'=>'required',

        'indikator'=>'required|array'

    ]);

    DB::beginTransaction();

    try{

        $penilaian=Penilaian::create([

            'murid_id'=>$request->murid_id,

            'guru_id'=>auth()->id(),

            'tanggal'=>date('Y-m-d')

        ]);

        $agama=[];

        $jati=[];

        $literasi=[];

        foreach($request->indikator as $indikator_id=>$nilai){

            DetailPenilaian::create([

                'penilaian_id'=>$penilaian->id,

                'indikator_id'=>$indikator_id,

                'nilai'=>$nilai

            ]);

            $indikator=Indikator::find($indikator_id);

            if(str_starts_with($indikator->kode,'A')){

                $agama[]=$nilai;

            }

            elseif(str_starts_with($indikator->kode,'J')){

                $jati[]=$nilai;

            }

            else{

                $literasi[]=$nilai;

            }

        }

        $nilaiAgama=$this->normalisasi($agama);

        $nilaiJati=$this->normalisasi($jati);

        $nilaiLiterasi=$this->normalisasi($literasi);

        $penilaian->update([

            'agama'=>$nilaiAgama,

            'jati_diri'=>$nilaiJati,

            'literasi'=>$nilaiLiterasi

        ]);

        DB::commit();

        return redirect()

        ->route('penilaian.index')

        ->with('success','Penilaian berhasil disimpan');

    }

    catch(\Exception $e){

        DB::rollback();

        return back()->withErrors($e->getMessage());

    }

}
private function normalisasi($nilai)
{

    $rata=array_sum($nilai)/count($nilai);

    return round(($rata/4)*100,2);

}
}