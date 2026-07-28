<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        $query = Penilaian::with('murid');

        if($request->filled('kelas')){
            $query->whereHas('murid',function($q) use($request){
                $q->where('kelas',$request->kelas);
            });
        }

        if($request->filled('kategori')){
            $query->where('kategori',$request->kategori);
        }

        if($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')){

            $query->whereBetween('tanggal',[
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);

        }

        $laporan = $query
            ->orderBy('tanggal','desc')
            ->paginate(15);

        return view('laporan.index',compact('laporan'));

    }

    public function pdf(Request $request)
    {

        $query = Penilaian::with('murid');

        if($request->filled('kelas')){
            $query->whereHas('murid',function($q) use($request){
                $q->where('kelas',$request->kelas);
            });
        }

        if($request->filled('kategori')){
            $query->where('kategori',$request->kategori);
        }

        if($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')){

            $query->whereBetween('tanggal',[
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);

        }

        $laporan = $query
            ->orderBy('tanggal')
            ->get();

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact('laporan')
        )->setPaper('A4','landscape');

        return $pdf->download('Laporan Penilaian.pdf');

    }
}