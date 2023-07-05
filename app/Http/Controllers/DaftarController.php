<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Baptis;
use App\Models\jemaat;
use App\Models\daftar;
use File;
use App\Http\Controllers\Storage;

class DaftarController extends Controller
{
    
    public function index(Request $request)
    {
       
        $jem = DB::table('jemaat')
      //  ->whereYear('tgl_masuk', '>','2010')
        ->where ('data', '=', 'Sementara')
        ->get();
         return view('Daftar.index',compact('jem'));
    
    }
    public function create() {
        $getRow = jemaat::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode= "BULU001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "BULU00".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "BULU0".''.($lastId->id + 1);
            } else {
                    $kode = "BULU".''.($lastId->id + 1);
            }
        }
        $jem= jemaat::all();
        return view('Daftar.create', compact('kode','jem'));
      
       // return view('Daftar.create', compact('jemaat'));
    }
    public function store(Request $request) {
        
        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);
        $this->validate($request, [
            'namalengkap_jem' => 'required|string|unique:jemaat,namalengkap_jem',
            
        ]);


        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $toPath="storage/".$request->induk;

            if(!File::isDirectory($toPath))
                File::makeDirectory($toPath, 0777, true, true);

            $file_name = time().'-'.$request->induk.'.pdf';
            $file->move($toPath, $file_name);

        DB::table('jemaat')->insert([
           
            'id' =>$request->id,
            'tgl_masuk'=>$request->tgl_masuk,
            'data'=>$request->data,
            'induk'=>$request->induk,
            'status_sidi' =>$request->status_sidi,
            'status_baptis' => $request->status_baptis,

            'namalengkap_jem' => $request->namalengkap_jem,
            'jk_jem' => $request->jk_jem,
            'tempat' => $request->tempat,
            'tanggal_jem'=>$request->tanggal_jem,
            'status_jem'=> $request->status_jem,
            'alamat_jem' => $request->alamat_jem,
            'kelurahan_jem'=>$request->kelurahan_jem,
            'kecamatan_jem'=>$request->kecamatan_jem,
            'kota_jem'=>$request->kota_jem,
            'provinsi_jem'=>$request->provinsi_jem,
            'nohp_jem' => $request->nohp_jem,
            'status_kawin' => $request->status_kawin,
            'kerja' => $request->kerja,
            'asal_gereja' => $request->asal_gereja,
            'alamat_gereja' => $request->alamat_gereja,
            'ilmu' => $request->ilmu,
            'data' => $request->data,
            'wilayah' => $request->wilayah,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
            'pendapatan' => $request->pendapatan,
             'pendidikan' =>$request->pendidikan,
             'file' => $file_name,
            


       
            ]);
        }
        else
        {
            $output->writeln("Check file !");
        }
            
   
        return redirect('/Daftar/index');
    }

    public function destroy($id)
    {
        $jem= jemaat::find($id);
        $jem->delete();

        return redirect('/Daftar/index')->with('success', 'Jemaat removed.');  
    }
    public function edit($id) {
      
        $data= jemaat::findOrFail($id);
        return view('Daftar.edit', compact('data'));
      
    }

    public function update($id, Request $request) {
    
        $jem = jemaat::find($id);
        $jem->induk =request('induk');

        $jem->tgl_masuk=request('tgl_masuk');
        $jem->data =request('data');
        $jem->asal_gereja =request('asal_gereja');
        $jem->alamat_gereja =request('alamat_gereja');

   
        $jem->namalengkap_jem =request('namalengkap_jem');
        $jem->jk_jem=request('jk_jem');
        $jem->tempat =request('tempat');
        $jem->tanggal_jem =request('tanggal_jem');
        $jem->status_jem =request('status_jem');
        $jem->alamat_jem =request('alamat_jem');
        $jem->kelurahan_jem =request('kelurahan_jem');
        $jem->kecamatan_jem =request('kecamatan_jem');
        $jem->provinsi_jem =request('provinsi_jem');
        $jem->nohp_jem =request('nohp_jem');
        $jem->statusgereja =request('statusgereja');
        $jem->kerja =request('kerja');
        $jem->pendidikan =request('pendidikan');
        $jem->ilmu =request('ilmu');
      
        $jem->ayah =request('ayah');
        $jem->ibu=request('ibu');
        $jem->pendapatan=request('pendapatan');
        $jem->wilayah =request('wilayah');
            
       
            $jem->update();

       //return redirect('/jemaat/index')->with('status', 'Berhasil diupdate!');
       return redirect('/Daftar/index');
    
    }
   
}
  


