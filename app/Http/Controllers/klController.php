<?php

namespace App\Http\Controllers;

use App\Models\kl;
use Illuminate\Http\Request;

class klController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kls = kl::get();
        return view ('admin.vw_klasifikasi', compact('kls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vw_klasifikasi_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kls = kl::create([
            'kode' => $request -> kode,
            'klasifikasi' => $request ->input('klasifikasi'),
            'keterangan' => $request -> keterangan
        ]);
        return redirect()-> route('vw_klasifikasi.index');
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
        $kls = kl::findorFail($id);
        return view('admin.vw_klasifikasi_edit', compact('kls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kls = kl::findOrFail($id);
        $kls ->update([
            'kode' => $request -> kode,
            'klasifikasi' => $request -> klasifikasi,
            'keterangan' => $request -> keterangan,
        ]);
        return redirect()->route('vw_klasifikasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kls = kl::findOrFail($id);
        $kls-> delete();

        return redirect()->route('vw_klasifikasi.index')->with('succes','Data Berhasil di hapus');
    }
}
