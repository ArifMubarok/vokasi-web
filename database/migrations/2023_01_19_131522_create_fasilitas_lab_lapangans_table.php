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
        Schema::create('lab_lapangan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('fasilitas_lab_lapangan', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->unsignedBigInteger('lap_id')->nullable();
            $table->timestamps();

            $table->foreign('lap_id')->references('id')->on('lab_lapangan')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_lab_lapangan');
        Schema::dropIfExists('lab_lapangan');
    }
};