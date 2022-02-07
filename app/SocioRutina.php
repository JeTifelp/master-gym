<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioRutina extends Model
{
    //
    protected $table='socio_rutina';
    protected $fillable=['fecha','id_usuario','id_rutina'];
}
