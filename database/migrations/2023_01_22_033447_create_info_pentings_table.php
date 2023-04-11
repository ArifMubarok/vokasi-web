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
        Schema::create('info_penting', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('foto_header');
            $table->text('konten');
            $table->enum('status', [1, 0]);
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
        Schema::dropIfExists('info_penting');
    }
};