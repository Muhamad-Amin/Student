<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// menghubungkan Carbon yang ada di created_at dan updated_at
use carbon\Carbon;
// menghubungkan seeder dengan model
use App\Models\ClassRoom;
// untuk Schema
use Illuminate\Support\Facades\Schema;


class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // untuk mengatasi yang tidak bisa diduplikat nama value yang ada di dalam colomnya
        Schema::disableForeignKeyConstraints();
        // untuk menghapus data yang sudah ada
        ClassRoom::truncate();
        // ClassRoom = nama model
        Schema::disableForeignKeyConstraints();
        // setelah menjalan semua perintah di atas semua data akan terhapus dan akan di gantikan dengan data yang ada di bawah

        // berikut memasukkan lebih dari satu data
        $data = [
            ['name' => '1A'],
            ['name' => '1B'],
            ['name' => '1C'],
            ['name' => '1D'],
            ['name' => '1E'],
            ['name' => '1F'],
        ];

        // kita akan melakukan pengulangan untuk memasukkan data
        foreach ($data as $value) {

            // ClassRoom = model
            // insert = memasukkan data
            ClassRoom::insert([
                // di bawah hanya memasukkan satu data
                // 'name' => 'Aui',
                // name = nama colom
                // Aui = nilai atau value dari kolom name
                // akan memasukkan data yang bernama Aui ke dalam kolom name

                'name' => $value['name']
                // name = nama kolom yang ada di dalam table database
                // $value['name'] = nilai name yang di ambil dari di atas

                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now()
                // di atas akan memberitahu kapan kolom itu di insert / masukkan

            ]);

        }
    }
}
