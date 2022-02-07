<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    //
    protected $table='mensualidad';
    protected $fillable=['fecha_inicio','fecha_fin','monto','id_usuario','id_promocion'];
}
