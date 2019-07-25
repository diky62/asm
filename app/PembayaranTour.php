<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranTour extends Model
{
	protected $table = "pembayaran_tour";
    protected $guarded = ["id"];

    public function order_tour(){
    	return $this->hasOne("App\OrderTour");
    }

}
