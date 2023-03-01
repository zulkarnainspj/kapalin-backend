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
        Schema::create('ship_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ship_id');
            $table->unsignedBigInteger('class_id');
            $table->integer('capacity');
            $table->timestamps();
            $table->foreign('ship_id')->references('id')->on('ships');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_classes');
    }
};
