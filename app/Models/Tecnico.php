<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    public function ordens()
{
    return $this->hasMany('App\Models\Tecnico','tecnico_id','id');
}
}
