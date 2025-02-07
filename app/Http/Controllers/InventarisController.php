<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('inventaris.index',compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request -> validate([
            'id_inventaris' => 'required|unique:inventaris',
            'nama_barang' => 'required|max:200',
            'kondisi' => 'required|max:200',
            'stok' => 'required|max:200',
            'tanggal_register' => 'required|max:200'
        ]);

        Inventaris::create($validate);
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
    public function edit(Inventaris $inventaris)
    {
       return view('inventaris.edit', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        $validate = $request -> validate([
            'id_inventaris' => 'required|unique:inventaris'. $inventaris->id,
            'nama_barang' => 'required|max:200',
            'kondisi' => 'required|max:200',
            'stok' => 'required|max:200',
            'tanggal_register' => 'required|max:200'
        ]);

        $inventaris->update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventaris $inventaris)
    {
        $inventaris->delete();
    }
}
