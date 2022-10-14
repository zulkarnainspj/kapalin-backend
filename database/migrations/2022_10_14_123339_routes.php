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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('port_id');
            $table->unsignedBigInteger('next_port_id');
            $table->double('distance')->nullable();
            $table->timestamps();
            $table->foreign('port_id')->references('id')->on('ports');
            $table->foreign('next_port_id')->references('id')->on('ports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
