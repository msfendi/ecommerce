<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 2. Buat data menggunakan seeder
        // perintah : php artisan make:seeder NamaSeeder
        DB::table('product')->insert([
            'name' => 'Baju Bodo',
            'price' => '50000',
            'image' => 'https://cf.shopee.co.id/file/706cf767cae58b7d3d5ccf314efe51e8',
        ]);
    }
}
