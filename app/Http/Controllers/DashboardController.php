<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function admin()
    {

        return view('admin.dashboard');

    }

    public function guru()
    {

        return view('guru.dashboard');

    }

}