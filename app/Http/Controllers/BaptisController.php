<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Baptis;
use App\Models\jemaat;
use File;

class BaptisController extends Controller
{

    public function tampil()
    {
        $data = DB::table('jemaat')
        ->join('baptis','jemaat.id','baptis.jemaat_id')
         ->where ('data', '!=', 'Wafat')
         ->get();


         return view('Baptis.index',compact('data'));

    }


    public function create() {

            $jemaat = DB::table('jemaat')
            ->where ('status_baptis', '=', 'Belum')
            ->get();
   


        return view('Baptis.create', compact('jemaat'));
    }

    public function store(Request $request) {

        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $toPath="datapub/".$request->tglbap;


            if(!File::isDirectory($toPath))
                File::makeDirectory($toPath, 0777, true, true);

            $file_name = time().'-'.$request->tglbap.'.pdf';
            $file->move($toPath, $file_name);

          

            DB::table('baptis')->insert([
                'waktu_bap' =>$request->waktu_bap,
            
                'tglbap' => $request->tglbap,
                'pendeta_bap' => $request->pendeta_bap,
                'jemaat_id' =>$request->jemaat_id,
                'file' => $file_name,
                'tempat_bap'=>$request->tempat_bap,

            ]);
    
        
    }
    else
    {
        $output->writeln("Check file !");
    }
        
        return redirect('/Baptis/index');
    }


    public function baptis()
    {
        return view('Baptis.create');
    }
    public function hapus($id)
    {  
        $b = baptis::where('id',$id)->delete();
    
        return redirect('/Baptis/index');

    }
    public function edit($id) {


      //  $jemaat= jemaat::all();
      $jemaat= jemaat::all();
      $baptis_id = DB::table('baptis')->where('jemaat_id', $id)->pluck('id')[0];
      $b = baptis::find($baptis_id);

        return view('Baptis.edit_bap', compact('b','jemaat'));
    }

    public function update(Request $request, $id) {
        $data = baptis::find($id);
        $data->waktu_bap =request('waktu_bap');
   
        $data->tglbap =request('tglbap');
        $data->jemaat_id = request('jemaat_id');
        $data->update();

      return redirect('/Baptis/index');

    }

    
   public function showPdf($tglbap)
   {
        $path = 'datapub/'.$tglbap;

        $file = '/'.DB::table('baptis')
                        ->where ('tglbap', '=', $tglbap)
                        ->pluck('file')[0];

    return response()->file($path.$file);
   //return response()->donwload($path.$file);
  
   }

  

}



