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
        Schema::create('kategori', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->enum('status', [0,1])->default(1);
            $table->timestamps();
        });

        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('foto_header');
            $table->text('konten');
            $table->enum('status', [0,1]);
            $table->boolean('isValidate');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create('berita_kategori', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('berita_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('berita_id')->references('id')->on('berita')
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
        Schema::dropIfExists('berita_kategori');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('kategori');
    }
};
