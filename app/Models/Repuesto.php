<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    public function ordens()
{
    return $this->hasMany('App\Models\Repuesto','repuesto_id','id');
}
}
