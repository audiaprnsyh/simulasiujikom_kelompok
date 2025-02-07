<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      $inventaris =   Inventaris::where('id_inventaris', $request->id_inventaris)->first();

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

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil');

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
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:belum kembali,sudah kembali,proses,batal'
        ]);
    
        $peminjaman = Peminjaman::find($id);
    
        if (!$peminjaman) { // Perbaikan pengecekan data
            return redirect()->route('peminjaman.index')->with('error', 'Data Peminjaman Tidak ditemukan');
        }
    
        if ($request->status == 'sudah kembali') {
            $peminjaman->tanggal_kembali = now();
    
            // Tambah Stok Barang Saat Barang Dikembalikan 
            $inventaris = Inventaris::where('id_inventaris', $peminjaman->id_inventaris)->first();
            if ($inventaris) {
                $inventaris->stok += 1;
                $inventaris->save();
            }
        }
    
        $peminjaman->status = $request->status;
        $peminjaman->petugas_id = Auth::id();
        $peminjaman->save();
    
        return redirect()->route('peminjaman.index')->with('success', 'Status Berhasil diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::find();
        $peminjaman->delete();
    }
}
