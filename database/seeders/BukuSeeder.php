<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //harga 	penulis 	penerbit 	tahun 	bahasa 	berat 	dimensi 	cover 	deskripsi 	stock 	created_at 	updated_at 	deleted_at
        for ($i=0; $i < 10; $i++) {
            # code...
            DB::table('buku')->insert([
                'judul' => Str::random(10),
                'harga' => 20000,
                'penulis' => Str::random(10),
                'penerbit' => Str::random(10),
                'tahun' => 2001,
                'bahasa' => 'Bahasa Inggris',
                'berat' => 200,
                'dimensi' => Str::random(2).' x '.Str::random(2),
                'cover' => 'Kertas Keras',
                'deskripsi' => Str::random(50),
            ]);
        }
    }
}
