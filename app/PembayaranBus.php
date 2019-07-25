<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranBus extends Model
{
    protected $table = "pembayaran_bus";
    protected $guarded = ["id"];

    public function order_bus(){
    	return $this->hasOne("App\OrderBus");
    }
}

