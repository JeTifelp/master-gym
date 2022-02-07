<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
    protected $table='asistencia';
    protected $fillable=['fecha','hora','presencia','id_usuario'];
}
