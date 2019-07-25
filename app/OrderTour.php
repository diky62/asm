<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTour extends Model
{
    //
    protected $table = "order_tour";
    protected $guarded = ["id"];

    public function Pembayaran_tour(){
        return $this->belongsTo("App\PembayaranTour");
    }
}
