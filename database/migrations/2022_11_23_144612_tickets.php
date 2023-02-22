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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('schedule_id');
            $table->string('ticket_code');
            $table->float('price');
            $table->integer('status')->default(1); // 0 Batal, 1 Dipesan, 2 Check In, 3 Selesai
            $table->boolean('pending')->default(0); // 0 False, 1 True
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('passenger_id')->references('id')->on('passengers');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
