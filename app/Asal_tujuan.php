<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asal_tujuan extends Model
{
    protected $table = "asal_tujuan";
    protected $guarded = ["id"];

    public function kotas(){
    	return $this->belongsTo("App\Kota");
    }
}
