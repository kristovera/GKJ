<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailKartuKeluarga extends Model
{
    use HasFactory;
    protected $table = 'detail_kartu_keluarga';
    protected $fillable = ['id','jemaat_id', 'kartukeluarga_id','status'];
  //  protected $dates = ['tanggal_jem'];
    

    public function jemaat()
    {
    	return $this->belongsTo(jemaat::class);
    } 

    public function kk()
    {
    	return $this->belongsTo(kk::class);
    } 
}
