<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventaris')->insert([
            ['id_inventaris' => 'A001', 'nama_barang' => 'Projektor HP', 'kondisi' => 'Baik', 'stok' => 10, 'tanggal_register' => '2012-06-06'],
            ['id_inventaris' => 'A002', 'nama_barang' => 'Projektor Acer', 'kondisi' => 'Baik', 'stok' => 20, 'tanggal_register' => '2011-06-05'],
            ['id_inventaris' => 'A003', 'nama_barang' => 'Projektor BenQ', 'kondisi' => 'Baik', 'stok' => 30, 'tanggal_register' => '2015-10-24'],
            ['id_inventaris' => 'A004', 'nama_barang' => 'Projector Infocus', 'kondisi' => 'Baik', 'stok' => 20, 'tanggal_register' => '2014-07-06'],
            ['id_inventaris' => 'B001', 'nama_barang' => 'Laptop HP', 'kondisi' => 'Perbaikan', 'stok' => 2, 'tanggal_register' => '2011-06-10'],
            ['id_inventaris' => 'B002', 'nama_barang' => 'Laptop Toshiba', 'kondisi' => 'Baik', 'stok' => 6, 'tanggal_register' => '2015-01-29'],
            ['id_inventaris' => 'C001', 'nama_barang' => 'Kabel VGA', 'kondisi' => 'Baik', 'stok' => 50, 'tanggal_register' => '2012-06-06'],
            ['id_inventaris' => 'C002', 'nama_barang' => 'Kabel HDMI', 'kondisi' => 'Baik', 'stok' => 10, 'tanggal_register' => '2015-06-06'],
            ['id_inventaris' => 'D001', 'nama_barang' => 'Converter VGA to HDMI', 'kondisi' => 'Baik', 'stok' => 3, 'tanggal_register' => '2014-07-06'],
            ['id_inventaris' => 'D002', 'nama_barang' => 'Terminal Listrik 4 Port', 'kondisi' => 'Baik', 'stok' => 20, 'tanggal_register' => '2011-10-05'],
        ]);
    }
}
