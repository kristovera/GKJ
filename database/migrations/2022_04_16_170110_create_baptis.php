<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jemaat_id')->unsigned();
            $table->foreign('jemaat_id')->references('id')->on('jemaat')->
            onDelete('cascade')->onUpdate('cascade');
            //$table->string('anak_bap')->nullable();
           // $table->date('lahir_bap')->nullable();
          $table->string('tempat_bap')->nullable();
            $table->string('hari_bap')->nullable();
            $table->string('waktu_bap')->nullable();
          //  $table->string('baptis')->nullable();
            $table->date('tglbap')->nullable();
            $table->string('pendeta_bap')->nullable();
         
     
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
        Schema::dropIfExists('baptis');
    }
};
