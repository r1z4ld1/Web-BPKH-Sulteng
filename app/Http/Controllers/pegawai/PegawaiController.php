<?php

namespace App\Http\Controllers\pegawai;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{


    public function dashboard()
    {

        return view('pegawai.dashboard');

    }


}
