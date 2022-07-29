<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telp');
            $table->string('pekerjaan');
            $table->string('alamat_lengkap');
            $table->string('nik');
            $table->string('link_ktp');
            $table->string('opd_tujuan');
            $table->string('rincian_informasi');
            $table->string('tujuan_informasi');
            $table->string('mendapatkan_informasi');
            $table->string('memperoleh_informasi');
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
        Schema::dropIfExists('permohonan_informasis');
    }
}
