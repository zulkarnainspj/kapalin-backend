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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('bank')->nullable();
            $table->string('account_number')->nullable();
            $table->text('receipt')->nullable();
            $table->smallInteger('status')->default(1); // 0 Tidak Valid, 1 Menunggu Pembayaran, 2 Pending, 3 Sukses
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
        Schema::dropIfExists('payments');
    }
};
