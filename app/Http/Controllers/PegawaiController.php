<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Baptis;
use App\Models\jemaat;
use App\Models\sidi;
use App\Models\kk;
use App\Models\keluar;

class PegawaiController extends Controller
{

    public function jemaat()
    {
   
        $data = DB::table('jemaat')    
        ->where('data','=','permanen') 
        ->get();
    
    
         return view('pegawai.cekjem',compact('data'));

    }


    
    public function masuk(Request $request)
    {
       
        $jem = DB::table('jemaat')
        ->whereYear('tgl_masuk', '>','2010')
        ->where('data','=','Sementara')
        ->get();
         return view('pegawai.cekmasuk',compact('jem'));
    
    }
    
    public function  keluar()
    {
        $data = DB::table('jemaat')
        ->join('keluar','jemaat.id','keluar.jemaat_id')
        ->get();
    
    
         return view('pegawai.cekkeluar',compact('data'));
    }
    
    public function edit_keluar($id) {

        $jemaat= jemaat::all();
        $k = keluar::findOrFail($id);
          return view('pegawai.Verif_keluar', compact('k','jemaat'));
      }

      
          
    public function UpKel($id, Request $request) {
        $data = keluar::find($id);
      //  $data = jemaat::find($id);
    
            $data->ket_keluar = $request->input('ket_keluar');
            $data->gerejadituju = $request->input('gerejadituju');
            $data->notelp_keluar = $request->input('notelp_keluar');
            $data->verif = $request->input('verif');
          //  $data->save();
          $data->update();
           
        return redirect('/pegawai/cekkeluar');
       
        }

  
  

    
    public function sidi()
    {
        
        $si = DB::table('jemaat')
     
        ->join('sidi','jemaat.id','sidi.jemaat_id')
        ->where('data','!=','Wafat')
        ->get();
    
    
         return view('pegawai.ceksidi',compact('si'));
    
    }
   
public function editSidi($id) {
    $j = jemaat::all();
    $s= sidi::findOrFail($id);
    $b= Baptis::all();
    
        return view('pegawai.Verif_sidi', compact('s','j','b'));
  
}

public function upSidi($id, Request $request) {
    
    $si = jemaat::find($id);
    $si = sidi::find($id);

  
    $si->waktu_sidi =$request->input('waktu_sidi');

    $si->tglsidi= $request->input('tglsidi');
    $si->tempat_sidi = $request->input('tempat_sidi');
    $si->pendeta_sidi = $request->input('pendeta_sidi');
    $si->verif_sidi = $request->input('verif_sidi');
   
        $si->update();

    return redirect('/pegawai/ceksidi')->with('status', 'Berhasil diupdate!');

}
  
      
    public function mati()
    {
        
        $ke = DB::table('jemaat')
        ->join('mati','jemaat.id','mati.jemaat_id')
      
        ->get();
    
    
         return view('pegawai.cekkem',compact('ke'));
    
    }
     
    public function kk(Request $request)
    {
        
        $q = kk::query();
        $datas1 = $q->get();

        $kk = kk::get();
        $jemaat   = jemaat::get();
        
        return view('pegawai.cekkartu', compact('kk', 'jemaat', 'datas1'));
  
    }
    

    
    public function baptis()
    {
        
        $data = DB::table('jemaat')
        ->join('baptis','jemaat.id','baptis.jemaat_id')
        ->where('data','!=','Wafat')
        ->get();
    
    
         return view('pegawai.cekbap',compact('data'));
    
    }

    public function editBap(jemaat $j, $id) {

        $b= baptis::findOrFail($id);
      //  $j= jemaat::all();
        return view('pegawai.Verif_bap', compact('b','j'));
    }

    public function upBap(Request $request, $id) {
    //    $data= baptis::findOrFail($id);
    
    $data = baptis::find($id);

        $data->waktu_bap =request('waktu_bap');

        $data->tglbap =request('tglbap');
        $data->pendeta_bap =request('pendeta_bap');
        $data->verif =request('verif');
     
        $data->jemaat_id = request('jemaat_id');
      //  $data->save();
        $data->update();
        return redirect('/pegawai/cekbap');
    }

  
   

}