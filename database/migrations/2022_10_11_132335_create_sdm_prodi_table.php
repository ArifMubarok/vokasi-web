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
        Schema::create('sdm_prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodi_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->string('link_iris')->nullable();
            $table->enum('posisi', ['dosen', 'admin']);
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')
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
        Schema::dropIfExists('sdm_prodi');
    }
};
