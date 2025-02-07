<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('inventaris')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventaris = Inventaris::all();
        return view('peminjaman.create', compact('inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_inventaris' => 'required|exists:inventaris,id_inventaris',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
        ]);

        Inventaris::where('id_inventaris', $request->id_inventaris)->first();

        if ($inventaris->stok > 0) {
            $inventaris->stok = $inventaris->stok - 1;
            $inventaris->save();
        } else {
            return redirect()->back()->with('error', 'Stok barang kosong');
        }

        Peminjaman::create([
            'id_inventaris' => $request->id_inventaris,
            'nama_barang' => $inventaris->nama_barang,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

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
