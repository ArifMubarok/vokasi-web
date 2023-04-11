<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('tingkat_prodi', function (Blueprint $table){
            $table->id();
            $table->integer('tingkat');
            $table->timestamps();
        });
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('tingkat');
            $table->string('logo')->nullable();
            $table->boolean('isActive')->default(0);
            $table->timestamps();

            $table->foreign('tingkat')->references('id')->on('tingkat_prodi')
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('tingkat_prodi');
        Schema::dropIfExists('prodi');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
