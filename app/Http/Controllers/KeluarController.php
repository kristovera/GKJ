<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\jemaat;
use App\Models\keluar;
use File;
use App\Http\Controllers\Storage;


class KeluarController extends Controller
{
    
    public function tambah()
    {
        $jemaat = DB::table('jemaat')
    
        ->where('data','!=','Wafat')
        ->get();
        return view('Keluar.tambah', compact('jemaat'));
    }
  

    public function  index()
    {
        $data = DB::table('jemaat')
        // ->join('baptis','jemaat.id','baptis.jemaat_id')
         ->join('keluar','jemaat.id','keluar.jemaat_id')
         ->get();
     
    
    
         return view('Keluar.index',compact('data'));
    }
    public function simpan(Request $request){

        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $toPath="keterangan/".$request->tgl_keluar;


            if(!File::isDirectory($toPath))
                File::makeDirectory($toPath, 0777, true, true);

            $file_name = time().'-'.$request->tgl_keluar.'.pdf';
            $file->move($toPath, $file_name);
            
            DB::table('keluar')->insert([
                'jemaat_id' =>$request->jemaat_id,
                'tgl_keluar' =>$request->tgl_keluar,
                 'ket_keluar' => $request->ket_keluar,
 
                 'gerejadituju'=>$request->gerejadituju,
                 'alamat_keluar' => $request->alamat_keluar,
                 'notelp_keluar' => $request->notelp_keluar,
                 
                 'file' =>$file_name
            ]);
    
        
    }
    else
    {
        $output->writeln("Check file !");
    }
        
        return redirect('/Keluar/index');
    }


            
   

    
   public function showPdf($tgl_keluar)
   {
        $path = 'keterangan/'.$tgl_keluar;

        $file = '/'.DB::table('keluar')
                        ->where ('tgl_keluar', '=', $tgl_keluar)
                        ->pluck('file')[0];

    return response()->file($path.$file);
   //return response()->donwload($path.$file);
  
   }

    
    public function edit($id) {

      
        //  $jemaat= jemaat::all();
        $jemaat= jemaat::all();
        $k = keluar::findOrFail($id);
          return view('Keluar.edit', compact('k','jemaat'));
      }

      
    public function update(Request $request, $id) {
        //    $data= baptis::findOrFail($id);
        
        $data = keluar::find($id);
        $data = jemaat::find($id);
    
            $data->ket_keluar=request('ket_keluar');
            $data->gerejadituju=request('gerejadituju');
            $data->notelp_keluar=request('notelp_keluar');
         
            $data->jemaat_id = request('jemaat_id');
          //  $data->save();
          $data->update();
    
          //return redirect('/jemaat/index')->with('status', 'Berhasil diupdate!');
          return redirect('/Keluar/index');
       
        }
        
    public function delete($id) {
        keluar::where('id', $id)->delete();
        return redirect('/Keluar/index');
     }
 
}