<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetiapSaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setiap_saats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen_setiap_saat');
            $table->text('link_dokumen_setiap_saat');
            $table->string('nama_file_setiap_saat');
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
        Schema::dropIfExists('setiap_saats');
    }
}
