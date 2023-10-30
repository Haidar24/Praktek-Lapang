<?php

namespace App\Http\Controllers;


use App\Models\sk;
use App\Models\sm;
use App\Models\User;
use Illuminate\Http\Request;
class DashboardPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // $data['chart'] = $chart->build();
    $JumlahPetugas = $this->JumlahPetugas();
    $JumlahUser = $this->JumlahUser();
    $JumlahSuratM = $this->SuratM();
    $JumlahSuratK = $this->SuratK();

    $dataTerbaru = sm::orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    $dataTerbaruSk = sk::orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    //untuk grapik
    $suratMasukData = sm::selectRaw('MONTH(Tgl_surat) as bulan, SUM(Lampiran_jumlah) as total_lampiran')
    ->groupBy('bulan')
    ->get();

    $suratKeluarData = sk::selectRaw('MONTH(tgl_surat) as bulan, SUM(lampiran_jumlah) as total_lampiran')
    ->groupBy('bulan')
    ->get();

    // Kirim data surat masuk setiap bulan ke view
    return view('home', compact('JumlahPetugas', 'JumlahUser', 'JumlahSuratM', 'JumlahSuratK', 'dataTerbaru', 'dataTerbaruSk', 'suratMasukData', 'suratKeluarData' ));
}



        public function JumlahPetugas(){
            $JumlahPetugas = User::where('level','admin')->count();
            return $JumlahPetugas;
        }

        public function JumlahUser(){
            $JumlahUser = User::where('level','user')->count();
            return $JumlahUser;
        }

        public function SuratM(){
            $JumlahSuratM = sm::count(); 
            return $JumlahSuratM;
        }

        public function SuratK(){
            $JumlahSuratK = sk::count(); 
            return $JumlahSuratK;
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
