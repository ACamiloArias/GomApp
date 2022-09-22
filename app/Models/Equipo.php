<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

public function ordens()
{
    return $this->hasMany('App\Models\Orden','equipo_id','id');
}
}
