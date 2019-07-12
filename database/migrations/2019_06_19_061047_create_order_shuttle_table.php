<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shuttle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jurusan_id')->unsigned();
            $table->string('nama');
            $table->string('alamat'); 
            $table->string('no_identitas'); 
            $table->date('tgl_berangkat');
            $table->integer('Harga');
            $table->integer('diskon')->nullable();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_shuttle');
    }
}
