<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBus extends Model
{
    protected $table = "order_bus";
    protected $guarded = ["id"];
}
