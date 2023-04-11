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

        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('value');
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->string('name')->unique();
            $table->timestamps();

            $table->primary('name');
        });

        Schema::create('page_konten', function (Blueprint $table) {
            $table->string('pages_name');
            $table->unsignedBigInteger('konten_id');

            $table->foreign('pages_name')->references('name')->on('pages')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('konten_id')->references('id')->on('konten')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['pages_name','konten_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_konten');
        Schema::dropIfExists('pages'); 
        Schema::dropIfExists('konten');
    }
};
