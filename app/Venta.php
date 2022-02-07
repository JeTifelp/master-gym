<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table='venta';
    protected $fillable=['cantidad','fecha','precio','id_producto'];
}
