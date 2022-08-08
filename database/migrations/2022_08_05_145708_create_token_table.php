<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token', function (Blueprint $table) {
            $table->bigIncrements('id_token');
            $table->string('token_generate', 100);
            $table->timestamp('expired_at');
            $table->unsignedBigInteger('id_toko')->unsigned()->nullable();
        });

        Schema::table('token', function (Blueprint $table) {
            $table->foreign('id_toko')->references('id_toko')->on('toko');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token');
    }
}
