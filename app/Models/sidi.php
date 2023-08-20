<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sidi extends Model
{
    use HasFactory;
    protected $table='sidi';
    protected $fillable =  [

      'id','jemaat_id','tempat_sidi','hari_sidi','tglsidi','waktu_sidi','pendeta_sidi','verif_sidi','catatan'

    ];
    public function jemaat()
    {
    	return $this->belongsTo('App\Models\jemaat','jemaat_id');
    } 
}
