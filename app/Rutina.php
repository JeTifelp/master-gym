<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    //
    protected $table='rutina';
    protected $fillable=['nombre','musculo'];
}
