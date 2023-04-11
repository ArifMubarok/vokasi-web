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
        Schema::create('staff_admin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('detail_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('file_masters')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('detail_id')->references('id')->on('detail_prodi')
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
        Schema::dropIfExists('staff_admins');
    }
};
