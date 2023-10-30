<?php

namespace App\Http\Controllers;
use App\Models\kl;
use App\Models\sk;
use Illuminate\Http\Request;

class skController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $sks = Sk::orderBy('created_at', 'desc')->get();
    return view('sk.vw_sk', compact('sks'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = kl::all(); // Ubah sesuai dengan nama model yang benar
        return view('sk.vw_sk_tambah',compact('klasifikasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaFile = ""; // Inisialisasi $namaFile di awal
        
        if ($request->hasFile('foto')) {
            $nm = $request->file('foto');
            $namaFile = $nm->getClientOriginalName();
            $nm->move(public_path().'/fotosk', $namaFile);
        }
        sk::create([

            'no_surat' => $request -> no_surat,
            'tgl_surat' => $request -> tgl_surat,
            'instansi_pengirim' => $request -> instansi_pengirim,
            'tgl_surat_di_terima' => $request -> tgl_surat_di_terima,
            'perihal' => $request -> perihal,
            'lampiran_jumlah' => $request -> lampiran_jumlah,
            'jenis' => $request -> jenis,
            'kls_id' => $request -> kls_id,
            'foto' => $namaFile,
            ]);
    
            return redirect()->route('vw_sk.index');
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
        $klasifikasis = kl::all();
        $sks = sk ::findOrFail($id);
            // Simpan timestamp sebelumnya
            session(['previousTimestamp' => $sks->updated_at]);

        return view('sk.vw_sk_edit', compact('sks','klasifikasis', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $namaFile = ""; // Inisialisasi $namaFile di awal
        
        if ($request->hasFile('foto')) {
            $nm = $request->file('foto');
            $namaFile = $nm->getClientOriginalName();
            $nm->move(public_path().'/fotosk', $namaFile);
        }
        
        $sks = Sk::findOrFail($id);
        
        $sks->update([
            'no_surat' => $request->no_surat,
            'instansi_pengirim' => $request->instansi_pengirim,
            'tgl_surat' => $request->tgl_surat,
            'tgl_surat_di_terima' => $request->tgl_surat_di_terima,
            'perihal' => $request->perihal,
            'lampiran_jumlah' => $request->lampiran_jumlah,
            'jenis' => $request -> jenis,
            'kls_id' => $request->kls_id,
            'foto' => $namaFile,
        ]);
        session()->forget('previousTimestamp');

        return redirect()->route('vw_sk.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sk::destroy($id);

        return redirect('vw_sk')->with('succes','Data Berhasil dihapus');   
    }

    
}
