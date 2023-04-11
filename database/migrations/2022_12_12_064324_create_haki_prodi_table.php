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
        Schema::create('haki_prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('grup_id');
            $table->string('haki');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grup_id')->references('id')->on('grup_riset')
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
        Schema::dropIfExists('haki_prodi');
    }
};
