<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventaris',
        'nama_barang',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'petugas',
    ];
}
