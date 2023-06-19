<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kk extends Model
{
    protected $table='kk';
    protected $fillable =  [

      'id','jemaat_id','no_kk'

    ];
    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 
    public function detailkartukeluarga()
    {
    	return $this->hasOne(DetailKartuKeluarga::class);
    }
   
}
