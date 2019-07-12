<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    protected $guarded = ["id"];

    public function order_shuttles(){
    	return $this->hasMany("App\OrderShuttle");
    }
}
