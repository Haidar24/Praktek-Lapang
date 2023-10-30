<?php

namespace App\Http\Controllers;

use App\Models\sk;
use Illuminate\Http\Request;

class laporanskController extends Controller
{
    public function index()
    {
    
        return view ('laporan.vw_laporan_sk');
    }
    public function cklaporan($tglawal,$tglakhir)
    {
        // dd("tanggal awal: ".$tglawal,"Tanggal Akhir : ".$tglakhir);
        $cetakPertanggal = sk::whereBetween('Tgl_surat',[$tglawal,$tglakhir])->get();
        return view('laporan.vw_cetak_laporan_sk', compact('cetakPertanggal','tglawal','tglakhir'));
    }
}
