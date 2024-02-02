<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductHistory;

class ProductHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['kode' => 'INV-1', 'nama' => 'Kursi Siswa', 'harga' => 200000],
            ['kode' => 'INV-2', 'nama' => 'Meja Siswa', 'harga' => 220000],
            ['kode' => 'INV-3', 'nama' => 'Komputer', 'harga' => 10220000],
            ['kode' => 'INV-4', 'nama' => 'Asbak', 'harga' => 10000],
            ['kode' => 'INV-5', 'nama' => 'Komputer', 'harga' => 10220000],
            ['kode' => 'INV-6', 'nama' => 'Asbak', 'harga' => 10220000],
            ['kode' => 'INV-7', 'nama' => 'Komputer', 'harga' => 10220000],
            ['kode' => 'INV-8', 'nama' => 'Komputer', 'harga' => 10220090],
        ];

        foreach ($products as $product) {
            ProductHistory::create($product);
        }
    }
}
