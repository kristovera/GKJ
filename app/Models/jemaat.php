<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jemaat extends Model
{
    protected $table = 'jemaat';
    protected $fillable = ['id','induk','namalengkap_jem','tempat','tanggal_jem',
    'status_jem','alamat_jem','kelurahan_jem','kecamatan_jem','kota_jem',
     'provinsi_jem','nohp_jem','statusgereja','pendidikan','kerja','pendapatan','ayah','ibu',
     'ilmu','wilayah','file','status_sidi','status_baptis'];






    /**
     * Method One To Many
     */
    public function Baptis()
    {
    	return $this->hasMany(Baptis::class);
    }
    public function Sidi()
    {
    	return $this->hasMany(Sidi::class);
    }

    public function kematian()
    {
    	return $this->hasMany(kematian::class);
    }

    public function detailkartukeluarga()
    {
    	return $this->hasMany(DetailKartuKeluarga::class);
    }
    
    public function daftar()
    {
    	return $this->hasMany(daftar::class);
    }
    public function keluar()
    {
    	return $this->hasMany(keluar::class);
    }

    public function kk()
    {
    	return $this->hasMany(kk::class);
    }

}

