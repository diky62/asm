<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = "kota";
    protected $guarded = ["id"];

     public function order_shuttles(){
    	return $this->hasOne("App\OrderShuttl");
    }
}
