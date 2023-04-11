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
        Schema::create('daftarSenat', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('foto')->nullable();
            $table->string('badanSenat')->nullable();
            $table->string('kedudukanSenat')->nullable();
            $table->string('profil')->nullable();
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
        Schema::dropIfExists('daftarSenat');
    }
};
