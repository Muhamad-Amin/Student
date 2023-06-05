<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database
     *
     * @return void
     *
     */
    public function run()
    {
        // \AppModels\User::factory(10)->create();

        // \AppModels\User::factory(10)->create(
            // 'name' => 'Test User',
            // 'email' => 'test@exaple.com',
        // );

        // untuk menjalankan semua seeder yang kita punya hanya dengan satu file

        $this->call([
            // ingat kita harus mengetikkan perent ( pembungkus ) dulu baru child ( anak )
            ClassSeeder::class,
            // ClassSeeder = nama seeder
            StudentSeeder::class,

            // untuk menjalankannya bisa menggunakan perintah :
            // php artisan db:seed
        ]);
    }
}
