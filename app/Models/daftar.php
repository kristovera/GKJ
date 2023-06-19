<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar extends Model
{
    use HasFactory;
    protected $table='daftar';
    protected $fillable =  [

       'id','jemaat_id','daftar',
     'asalgereja','alamatgereja', 'namalengkap_jem','tempat','tanggal',
     'status','alamat','kelurahan','kecamatan','kota',
      'provinsi_','nohp','ayah','ibu','hubkk',
      

    ];
    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 

}
