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
        Schema::create('lab', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('fasilitas_lab', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->unsignedBigInteger('lab_id')->nullable();
            $table->timestamps();

            $table->foreign('lab_id')->references('id')->on('lab')
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
        Schema::dropIfExists('fasilitas_lab');
        Schema::dropIfExists('lab');
    }
};