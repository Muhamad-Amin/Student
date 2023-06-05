<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;

// untuk Schema
// menghubungkan seeder dengan model
use Illuminate\Database\Seeder;
// untuk Carbon
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // untuk mengatasi yang tidak bisa diduplikat nama value yang ada di dalam colomnya
    //     Schema::disableForeignKeyConstraints();
    //     // untuk menghapus data yang sudah ada
    //     student::truncate();
    //     // ClassRoom = nama model
    //     Schema::disableForeignKeyConstraints();
    //     // setelah menjalan semua perintah di atas semua data akan terhapus dan akan di gantikan dengan data yang ada di bawah

    //     // memasukkan data
    //     $data = [
    //         [
    //             'name' => 'aiu',
    //             'gender' => 'P',
    //             'nis' => '0101001',
    //             'class_id' => 2, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'budi',
    //             'gender' => 'L',
    //             'nis' => '0101002',
    //             'class_id' => 2, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'siti',
    //             'gender' => 'P',
    //             'nis' => '0101003',
    //             'class_id' => 1, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'tono',
    //             'gender' => 'L',
    //             'nis' => '0101004',
    //             'class_id' => 3, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'bagong',
    //             'gender' => 'L',
    //             'nis' => '0101005',
    //             'class_id' => 5, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'siong',
    //             'gender' => 'L',
    //             'nis' => '0101006',
    //             'class_id' => 3, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ], [
    //             'name' => 'hayya',
    //             'gender' => 'P',
    //             'nis' => '0101007',
    //             'class_id' => 1, // ini untu mengisi class id ( diisi dengan no karna forenkey dan mempunyai relation )
    //         ],
    //     ];

    //     // memasukk data yang di atas

    //     foreach ($data as $value) {
    //         Student::insert([
    //             'name' => $value['name'],
    //             'gender' => $value['gender'],
    //             'nis' => $value['nis'],
    //             'class_id' => $value['class_id'],
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ]);
    //     }

    Student::factory()->count(20)->create();
    }
}
