<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesan');
            $table->string('tujuan');
            $table->string('ket_tujuan');
            $table->string('penjemputan'); 
            $table->string('waktu_keberangkatan');
            $table->date('tgl_berangkat'); 
            $table->date('tgl_kembali');
            $table->integer('jml_peserta');
            $table->integer('jml_bus');
            $table->string('ket_bus');
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
        Schema::dropIfExists('order_tour');
    }
}
