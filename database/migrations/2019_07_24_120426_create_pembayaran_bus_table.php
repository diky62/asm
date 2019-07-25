<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_bus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_bus_id')->unsigned();
            $table->date('tanggal');
            $table->string('jumlah');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('order_bus_id')->references('id')->on('order_bus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_bus');
    }
}
