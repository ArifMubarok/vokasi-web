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
        Schema::create('penelitian_dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodi_id');
            $table->string('dosen');
            $table->integer('nidn');
            $table->string('judul');
            $table->string('skim');
            $table->string('jenis');
            $table->integer('tahun');
            $table->string('bidang_ilmu');
            $table->string('pendanaan');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penelitian_dosen');
    }
};
