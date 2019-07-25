<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_tour_id')->unsigned();
            $table->date('tanggal');
            $table->string('jumlah');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('order_tour_id')->references('id')->on('order_tour')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_tour');
    }
}
