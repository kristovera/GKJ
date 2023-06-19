<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class kematian extends Model
{
  use HasFactory;

    protected $table='mati';

    protected $fillable =  [

      'id','jemaat_id','usia_mati','wafat','pendeta','tempat'

    ];
    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 

   
}

