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
        Schema::create('jemaat', function (Blueprint $table) {

            $table->increments('id');
            $table->string('induk')->nullable();
            $table->string('file')->nullable();
            $table->string('namalengkap_jem')->nullable();
            $table->enum('jk_jem', ['P', 'W'])->nullable();
            $table->string('tempat')->nullable();
            $table->date('tanggal_jem')->nullable();
            $table->enum('status_jem', ['Belum Menikah', 'Menikah', 'Janda', 'Duda'])->nullable();
            $table->string('alamat_jem')->nullable();
            $table->string('kelurahan_jem')->nullable();
            $table->string('kecamatan_jem')->nullable();
            $table->string('kota_jem')->nullable();
            $table->string('provinsi_jem')->nullable();
            $table->string('nohp_jem')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();

            $table->enum('ilmu', ['Teknik','Hukum','Sastra','Kesehatan','Sosial','Ekonomi','Pendidikan','Teknologi','Lainnya'])->nullable();
            $table->string('data')->nullable();
            $table->enum('pendapatan', ['0-500','500-1','1-2','2-3','lebih dari 3'])->nullable();

            $table->enum('wilayah', ['Induk Bulu','Weru','Bugel','Karangtengah'])->nullable();
            $table->enum('hubkk', ['Istri','Anak'])->nullable();
            $table->enum('statusgereja', ['Jemaat', 'Simpatisan'])->nullable();
            $table->string('kerja')->nullable();
            $table->enum('pendidikan', ['TK','SD', 'SMP','SMA','SMK','S1','S2','S3'])->nullable();

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
        Schema::dropIfExists('jemaat');
    }
};
