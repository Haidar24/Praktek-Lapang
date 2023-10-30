<?php

namespace App\Http\Controllers;
use App\Models\kl;
use App\Models\sm;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\klasifikasi;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Facades\Log;

class smController extends Controller
{
    /**
     * Display a listing of the resource.git add README.md
     */
    public function index()
    {
        $sms = sm::get();
        return view('sm.vw_sm', compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     */
            public function create()
        {
            $klasifikasis = kl::all(); // Ubah sesuai dengan nama model yang benar
            return view('sm.vw_sm_tambah_data', compact('klasifikasis'));
        }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $namaFile = ""; // Inisialisasi $namaFile di awal
        
    //     if ($request->hasFile('foto')) {
    //         $nm = $request->file('foto');
    //         $namaFile = $nm->getClientOriginalName();
    //         $nm->move(public_path().'/arsip', $namaFile);
    //     }
    
    //     $data = sm::create([
    //         'No_surat' => $request->input('No_surat'),
    //         'Instansi_pengirim' => $request->input('Instansi_pengirim'),
    //         'Tgl_surat' => $request->input('Tgl_surat'),
    //         'Tgl_surat_di_terima' => $request->input('Tgl_surat_di_terima'),
    //         'Perihal' => $request->input('Perihal'),
    //         'Lampiran_jumlah' => $request->input('Lampiran_jumlah'),
    //         'kls_id' => $request ->input('kls_id'),
    //         'foto' => $namaFile,
    //     ]);
    
    //     return redirect()->route('vw_sm.index');
    // }
    

    // public function scanText($pathToPDF)
    // {
    //     $pdf = new Pdf($pathToPDF);
    //     $scannedText = $pdf->text();
    
    //     return $scannedText;
    // }

    
    
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $nm = $request->file('foto');
            $namaFile = $nm->getClientOriginalName();
            $nm->move(public_path() . 'arsip/', $namaFile);
            
            // Pemeriksaan apakah file berhasil diunggah
            if (file_exists(public_path() . 'arsip/' . $namaFile)) {
                $pathToPDF = public_path() . '\\arsip\\' . $namaFile;


                $scannedText = $this->scanText($pathToPDF);
    
                
                $classification = 'Tidak diklasifikasikan'; // Klasifikasi default jika tidak ada klasifikasi yang sesuai
                $keywords = [
                    'surat perintah', 'Surat Perintah', 'surat Perintah', 'Surat perintah',
                    'surat magang', 'Surat Magang', 'surat Magang', 'Surat magang','perintah','magang'
                ];
    
                foreach ($keywords as $keyword) {
                    if (strpos($scannedText, $keyword) !== false) {
                        $classification = 'perintah';
                        break;
                    }
                }
    
                // Lakukan pengecekan untuk memastikan hasil klasifikasi
                Log::info('Klasifikasi: ' . $classification); // Pastikan nilai klasifikasi sebelum disimpan
                sm::create([
                    'No_surat' => $request->input('No_surat'),
                    'Instansi_pengirim' => $request->input('Instansi_pengirim'),
                    'Tgl_surat' => $request->input('Tgl_surat'),
                    'Tgl_surat_di_terima' => $request->input('Tgl_surat_di_terima'),
                    'Perihal' => $request->input('Perihal'),
                    'Lampiran_jumlah' => $request->input('Lampiran_jumlah'),
                    'kls_id' => $request->input('kls_id'),
                    'foto' => $namaFile,
                    'scannedText' => $scannedText,
                    'classification' => $classification,
                ]);
            }
        }
        Log::info('Data disimpan ke database.'); 
        return redirect()->route('vw_sm.index');
    }
    
    public function scanText($pathToFile)
{
    try {
        $text = Pdf::getText($pathToFile);
        return $text;
    } catch (\Exception $e) {
        Log::error('Error reading PDF: ' . $e->getMessage());
        Log::error('File path: ' . $pathToFile);
        return 'Error: Could not read PDF file';
    }
}

    

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $klasifikasis = kl::all();
        $sms = sm::findorFail($id);
        return view('sm.vw_sm_edit',compact('sms','klasifikasis'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sms = sm::findOrFail($id);
        $sms ->update([
            'No_surat' => $request-> No_surat,
            'Instansi_pengirim' => $request-> Instansi_pengirim,
            'Tgl_surat' => $request-> Tgl_surat,
            'Tgl_surat_di_terima' => $request -> Tgl_surat_di_terima,
            'Perihal' => $request ->Perihal,
            'Lampiran_jumlah' =>$request -> Lampiran_jumlah,
            'jenis' => $request -> jenis,
            'kls_id' => $request -> kls_id,

        ]);
        return redirect()->route('vw_sm.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sms = sm::findOrFail($id);
        $sms-> delete();

        return redirect()->route('vw_sm.index')->with('succes','Data Berhasil di hapus');
    }
    
        public function bacaPDF($id)
        {
            $sms = sm::find($id);
            
            if (!$sms) {
                return "Surat tidak ditemukan.";
            }

            $path = public_path('arsip/' . $sms->foto);

            if (File::exists($path)) {
                return response()->file($path, [
                    'Content-Disposition' => 'inline; filename="' . $sms->foto . '"',
                    'Content-Type' => 'application/pdf',
                ]);
            } else {
                return "File PDF tidak ditemukan.";
            }
        }
    

}

 