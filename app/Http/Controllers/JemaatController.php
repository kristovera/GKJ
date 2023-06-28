<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\jemaat;
use App\Models\sidi;
use App\Models\Baptis;
use File;
use App\Http\Controllers\Storage;

class JemaatController extends Controller
{
    public function destroy($id)
    {
        $jem= jemaat::find($id);
        $jem->delete();

        return redirect('/jemaat/index')->with('success', 'Jemaat removed.');  
    }

    public function index()

    {
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

        return view('jemaat.tambah_jem', compact('kode'));
    }
    public function jemaat()
    {

        $data = DB::table('jemaat')
        ->where ('data', '=', 'Permanen')
        ->get();

         return view('jemaat.index',compact('data'));

    }

    public function simpan_jem(Request $request){

    
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
               'status_sidi' =>$request->status_sidi,
                'status_baptis' => $request->status_baptis,

                'induk'=>$request->induk,
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
                'statusgereja' => $request->statusgereja,
                'kerja' => $request->kerja,
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
        return redirect('/jemaat/index');
    }
    public function edit($id) {

        $je= jemaat::findOrFail($id);
        return view('jemaat.edit', compact('je'));

    }

    public function update($id, Request $request) {

        $jem = jemaat::find($id);

 
        $jem->induk =$request->input('induk');
        $jem->namalengkap_jem = $request->input('namalengkap_jem');
        $jem->jk_jem  = $request->input('jk_jem');
        $jem->tempat= $request->input('tempat');
        $jem->tanggal_jem = $request->input('tanggal_jem');
        $jem->status_jem = $request->input('status_jem');
        $jem->alamat_jem = $request->input('alamat_jem');
        $jem->kelurahan_jem = $request->input('kelurahan_jem');
        $jem->kecamatan_jem = $request->input('kecamatan_jem');
        $jem->kota_jem = $request->input('kota_jem');
        $jem->provinsi_jem =$request->input('provinsi_jem');
        $jem->nohp_jem = $request->input('nohp_jem');

        $jem->statusgereja = $request->input('statusgereja');
        $jem->kerja = $request->input('kerja');
        $jem->pendidikan = $request->input('pendidikan');
        $jem->ilmu = $request->input('ilmu');
      
        $jem->ayah = $request->input('ayah');
        $jem->ibu= $request->input('ibu');
        $jem->pendapatan= $request->input('pendapatan');
        $jem->wilayah = $request->input('wilayah');
 
        $jem->status_sidi = $request->input('status_sidi');
        $jem->status_baptis = $request->input('status_baptis');



            $jem->update();

       //return redirect('/jemaat/index')->with('status', 'Berhasil diupdate!');
       return redirect('/jemaat/index');

    }

   public function showPdf($induk)
   {
        $path = 'storage/'.$induk;

        $file = '/'.DB::table('jemaat')
                        ->where ('induk', '=', $induk)
                        ->pluck('file')[0];

    return response()->file($path.$file);
   //return response()->donwload($path.$file);
  
   }

}
