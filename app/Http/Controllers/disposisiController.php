<?php

namespace App\Http\Controllers;

use App\Models\kl;
use App\Models\sm;
use App\models\jabatan;
use App\Models\dispo;
use Illuminate\Http\Request;

class disposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms = sm::all();
        $klasifikasi = kl::all();
        $jabatan = jabatan::all();
        $dispo = dispo::all();
        return view('dispo.vw_dispo', compact('sms','klasifikasi','dispo'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
        public function create()
    {
        $sms = sm::all(); // Mengambil semua data 'sm', sesuaikan dengan kebutuhan Anda
        $klasifikasis = kl::all(); // Ambil data 'klasifikasi' jika diperlukan
        $jabatans = jabatan::all();
        return view('dispo.vw_dispo_tambah', compact('sms', 'klasifikasis','jabatan'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dispo::create([
            // 'tanggal_jatuh_tempo' => $request->jabatan_id,
            'No_surat_id' => $request->No_surat_id,
            'jabatan_id' => $request->jabatan_id,
            'catatan' => $request->catatan,
        ]);

        // Simpan disposisi ke database sesuai data yang diisi dalam form
        // ... tambahkan logika penyimpanan disposisi di sini

        return redirect()->route('vw_disposisi.index')
            ->with('success', 'Disposisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil data surat masuk berdasarkan ID
        $suratMasuk = Sm::find($id);
        $jabatans = jabatan::all();
        // Menampilkan tampilan detail surat masuk
        return view('dispo.vw_dispo_tambah', compact('suratMasuk','jabatans'));
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
