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
        Schema::create('profilpimpinan', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('foto')->nullable();
            $table->integer('title')->nullable();
            $table->string('kedudukan')->nullable();
            $table->text('profil')->nullable();
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
        Schema::dropIfExists('profilpimpinan');
    }
};
