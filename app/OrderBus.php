<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBus extends Model
{
    protected $table = "order_bus";
    protected $guarded = ["id"];

    public function pembayaran_bus(){
        return $this->belongsTo("App\PembayaranBus");
    }
}

