<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    static $rules =[
        'equipo_id'=> 'required','NombreEquipo'=> 'required'
    ];

    protected $perPage = 20;

    protected $fillable = ['equipo_id','NombreEquipo' ];
    use HasFactory;
}
