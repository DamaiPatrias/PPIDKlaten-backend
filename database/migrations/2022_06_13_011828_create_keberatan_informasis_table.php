<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeberatanInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keberatan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('nomer_registrasi_permohonan_informasi');
            $table->string('tujuan_penggunaan_informasi');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telp');
            $table->string('pekerjaan');
            $table->string('alamat_lengkap');
            $table->string('nama_lengkap_kuasa')->nullable();
            $table->string('email_kuasa')->nullable();
            $table->string('no_telp_kuasa')->nullable();
            $table->string('pekerjaan_kuasa')->nullable();
            $table->string('alamat_lengkap_kuasa')->nullable();
            $table->string('link_surat_kuasa')->nullable();
            $table->string('alasan_keberatan')->nullable();
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
        Schema::dropIfExists('keberatan_informasis');
    }
}
