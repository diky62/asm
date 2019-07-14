<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesan');
            $table->string('tujuan');
            $table->string('penjemputan');
            $table->string('keterangan_lokasi'); 
            $table->string('waktu_keberangkatan');
            $table->date('tgl_berangkat'); 
            $table->date('tgl_kembali');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->integer('harga');
            $table->integer('diskon')->nullable();
            $table->integer('total');
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
        Schema::dropIfExists('order_bus');
    }
}
