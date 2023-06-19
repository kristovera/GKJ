<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKartuKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kartu_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jemaat_id')->unsigned();
            $table->foreign('jemaat_id')->references('id')->on('jemaat')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('kartukeluarga_id')->unsigned();
            $table->foreign('kartukeluarga_id')->references('id')->on('kk')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_kartu_keluarga');
    }
}
