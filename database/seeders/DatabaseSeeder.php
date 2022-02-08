<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 3. Panggil class seeder untuk mengeksekusi seeder
        //perintah : php artisan db:seed
        $this->call(ProductSeeder::class);
    }
}
