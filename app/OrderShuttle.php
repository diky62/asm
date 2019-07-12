<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderShuttle extends Model
{
    protected $table = "order_shuttle";
    protected $guarded = ["id"];

    public function jurusan(){
    	return $this->belongsTo('App\Jurusan');
    }
}
