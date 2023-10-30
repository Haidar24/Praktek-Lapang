<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\jabatan;
use Illuminate\Http\Request;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $Users = User::all();
    $jabatan = Jabatan::all(); // Menggunakan nama model yang benar
    return view('admin.vw_pengguna', compact('Users','jabatan'));
}

public function create()
{
    $jabatans = Jabatan::all(); // Menggunakan nama model yang benar
    return view('admin.vw_p_tambah', compact('jabatans'));
}

    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([

            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'level' => $request -> level,
            'jabatan_id' => $request -> jabatan_id,
             
            ]);
    
            return redirect('vw_pengguna');
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
        $Users = User::findOrFail($id);
        $Users-> delete();

        return redirect()->route('vw_pengguna.index')->with('succes','Data Berhasil di hapus');
    }
}
