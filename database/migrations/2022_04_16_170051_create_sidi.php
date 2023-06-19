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
        Schema::create('sidi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jemaat_id')->unsigned();
            $table->foreign('jemaat_id')->references('id')->on('jemaat')->onDelete('cascade')->onUpdate('cascade');
            
           // $table->string('anak_sidi')->nullable();
           $table->date('tempat_sidi')->nullable();
            $table->string('hari_sidi')->nullable();
          //  $table->string('alamat_sidi')->nullable();

            $table->string('waktu_sidi')->nullable();
           // $table->string('sidi')->nullable();
            $table->date('tglsidi')->nullable();
            $table->string('pendeta_sidi')->nullable();
           
     
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
        Schema::dropIfExists('sidi');
    }
};
