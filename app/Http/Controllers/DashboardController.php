<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Penilaian;
use App\Models\User;

class DashboardController extends Controller
{

    public function admin()
    {
        $data = [
            'totalUser' => User::count(),
            'totalMurid' => Murid::count(),
            'totalPenilaian' => Penilaian::count(),
            'totalGuru' => User::where('role', 'guru')->count(),
            'recentPenilaians' => Penilaian::with('murid')->latest()->take(4)->get(),
        ];

        return view('admin.dashboard', $data);
    }

    public function guru()
    {
        $data = [
            'totalMurid' => Murid::count(),
            'totalPenilaian' => Penilaian::count(),
            'totalHasil' => Penilaian::whereNotNull('hasil_fuzzy')->count(),
            'kategoriBSH' => Penilaian::where('kategori', 'BSH')->count(),
            'recentPenilaians' => Penilaian::with('murid')->latest()->take(4)->get(),
        ];

        return view('guru.dashboard', $data);
    }

}