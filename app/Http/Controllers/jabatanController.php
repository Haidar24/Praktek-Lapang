<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = jabatan::all();
        return view('jabatan.vw_jabatan',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = jabatan::all();
        return view('jabatan.vw_jabatan_tambah',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jabatan::create([
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('vw_jabatan.index')->with('success','');
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
        $item = jabatan::find($id);
        $item->delete();
        return redirect()->route('vw_jabatan.index');
    }
}
