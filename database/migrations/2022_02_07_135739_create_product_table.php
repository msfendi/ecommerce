<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Migration untuk membuat field database
        // Perintah : php artisan make:migration create_namatable_table
        //            php artisan fresh -> untuk delete + migrate ulang
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price', 15);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
