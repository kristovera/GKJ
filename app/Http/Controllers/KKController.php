<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kk;
use App\Models\jemaat;
use App\Models\DetailKartuKeluarga;;
//use App\Models\Istri;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class KKController extends Controller
{
    
    public function index(Request $request)
    {
        
        $q = kk::query();
        $datas1 = $q->get();
        
     

        $kk = kk::get();
        $jemaat   = jemaat::get();

       
        
        return view('KK.index', compact('kk', 'jemaat', 'datas1'));
  
    }
        public function create()
    {
    	$getRow = kk::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode= "001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "00".''.($lastId->id + 1);
            } else {
                    $kode = "".''.($lastId->id + 1);
            }
        }

        $jemaat = jemaat::WhereNotExists (function($query) {
            $query->select(DB::raw(1))
            ->from('kk')
            ->whereRaw('kk.jemaat_id = jemaat.id' );
         })->get();

return view('KK.create' , compact('jemaat','kode'));

    }
       //SELECT `namalengkap_jem`, `tanggal_jem`, (YEAR(CURDATE())-YEAR(tanggal_jem)) 
    //AS Umur FROM jemaat WHERE (YEAR(CURDATE())-YEAR(tanggal_jem)) > 20;
   
    public function store(Request $request) {
        $data = new  kk();
        $data->no_kk= request('no_kk');
    
        $data->jemaat_id = request('jemaat_id');
        $data->save();
        Session::flash('message', 'Data  berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        
     //   alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect('/KK/index');
    }
  


    public function show($id)
    {   
           
        Session::put('halaman_url', request()->fullUrl());



        $data = kk::findOrFail($id);

        $datakk = DetailKartuKeluarga::find('id');
        $jemaat = jemaat::get();
        $dt = DetailKartuKeluarga::where([
            ['id']
        ])->get();
     //   $istri = Istri::get();

        $det = DetailKartuKeluarga::join('kk', 'kk.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('jemaat', 'jemaat.id', '=' , 'detail_kartu_keluarga.jemaat_id')
        ->where('kartukeluarga_id', $id)
        ->get(['jemaat.namalengkap_jem','jemaat.pendidikan',
        'jemaat.induk','detail_kartu_keluarga.status']);

       
        
        
        return view('KK.view', compact('data','dt','jemaat','det'));
    }

   
    public function tambah_kk($id)
    {
        $det = DetailKartuKeluarga::join('kk', 'kk.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('jemaat', 'jemaat.id', '=' , 'detail_kartu_keluarga.jemaat_id')
        ->where('kartukeluarga_id', $id)
        ->get(['jemaat.namalengkap_jem','jemaat.id']);

        $dt = DetailKartuKeluarga::where([
            ['kartukeluarga_id', '=', 'kk.id']
        ])->get();

         $jemaat = jemaat::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('kk')
            ->whereRaw('kk.jemaat_id = jemaat.id');

         })->get();

        $data = kk::findOrFail($id);

        $kk = kk::get();
  
         return view('KK.tambah_view' , compact('jemaat','kk','det','dt','data'));
    }
   
    public function simpan_kk(Request $request)
    {

        DetailKartuKeluarga::create([
            'jemaat_id' => $request->input('jemaat_id'),
            'kartukeluarga_id' => $request->input('kartukeluarga_id'),
            'status' => $request->input('status')
           
        ]);

        

        Session::flash('message', 'Data istri berhasil ditambahkan!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah ditambahkan!');
        if(session('halaman_url')){
            return
            Redirect(session('halaman_url'));
        }
        

      
      //  return redirect('/KK/index');
    }   
    public function delete($id)
    {
        $kk= jemaat::find($id);
        $kk->delete();

        return redirect('/KK/index/view')->with('success');  
    }

    public function hapus($id)
    {
        kk::find($id)->delete();
        

    }



}