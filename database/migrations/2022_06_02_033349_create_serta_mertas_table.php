<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertaMertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serta_mertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen_serta_merta');
            $table->text('link_dokumen_serta_merta');
            $table->string('nama_file_serta_merta');
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
        Schema::dropIfExists('serta_mertas');
    }
}
