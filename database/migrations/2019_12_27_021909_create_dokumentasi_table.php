<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->bigIncrements('id_dokumentasi');
            $table->integer('id_sub_kegiatan');
            $table->string('foto_dokumentasi')->default('default-foto.jpg');
            $table->string('waktu_foto_dokumentasi');
            $table->string('video_dokumentasi')->default('default-video.jpg');
            $table->string('waktu_video_dokumentasi');
            $table->string('persentase_fisik');
            $table->string('persentase_keuangan');
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
        Schema::dropIfExists('dokumentasi');
    }
}
