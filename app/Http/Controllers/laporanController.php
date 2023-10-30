<?php

namespace App\Http\Controllers;

use App\Models\sm;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        return view ('laporan.vw_laporan',);
    }

    public function cklaporan($tglawal,$tglakhir)
    {
        // dd("tanggal awal: ".$tglawal,"Tanggal Akhir : ".$tglakhir);
        $cetakPertanggal = sm::whereBetween('Tgl_surat',[$tglawal,$tglakhir])->get();
        return view('laporan.vw_cetak_laporan_sm', compact('cetakPertanggal','tglawal','tglakhir'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
