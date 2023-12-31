<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ve', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_chuyenxe')->unsigned()->nullable();
            $table->integer('id_donhang')->unsigned()->nullable();
            $table->string('vitrighe');
            $table->string('mabimat')->unique();
            $table->string('mave')->unique();
            $table->integer('trangthai');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_chuyenxe')->references('id')->on('chuyenxe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ve');
    }
}
