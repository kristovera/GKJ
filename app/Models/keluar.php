<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
    use HasFactory;
    protected $table='keluar';
    protected $fillable =  [

      'id','jemaat_id','tgl_keluar','gerejadituju','alamat_keluar','notelp_keluar','ket_keluar','verif'

    ];
    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 
}
