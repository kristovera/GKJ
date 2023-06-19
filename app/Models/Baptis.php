<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    use HasFactory;
    protected $table='baptis';


    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 

}
