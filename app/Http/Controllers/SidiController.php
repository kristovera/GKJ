<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Baptis;
use App\Models\sidi;
use App\Models\jemaat;
use Carbon\Carbon;
use File;

class SidiController extends Controller
{
    
    public function tampil()
    {
        
        $si = DB::table('jemaat')
       // ->join('baptis','jemaat.id','baptis.jemaat_id')
        ->join('sidi','jemaat.id','sidi.jemaat_id')
        ->where ('data', '!=', 'Wafat')
        ->get();
    
    
         return view('Sidi.index',compact('si'));
    
    }
/// (YEAR(CURDATE()) - YEAR(tanggal_jem)) AS UMUR FROM jemaat WHERE (YEAR(CURDATE()) - YEAR(tanggal_jem)) > 17;
    public function create() {
       
        $jemaat = DB::table('jemaat')
        // ->join('baptis','jemaat.id','baptis.jemaat_id')
         ->where ('status_sidi', '=', 'Belum')
         ->whereRaw('YEAR(CURDATE()) - YEAR(tanggal_jem) > 17')
         ->get();

        return view('Sidi.tambah_sidi', compact('jemaat'));
    }

    public function destroy($id)
    {
        $s= sidi::find($id);
        $s->delete();

        return redirect('/jemaat/index')->with('success', 'Jemaat removed.');  
    }

    public function store(Request $request) {

        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $toPath="file/".$request->tglsidi;

            
            if(!File::isDirectory($toPath))
                File::makeDirectory($toPath, 0777, true, true);

            $file_name = time().'-'.$request->tglsidi.'.pdf';
            $file->move($toPath, $file_name);

            DB::table('sidi')->insert([
                'waktu_sidi' =>$request->waktu_sidi,
                'tglsidi' => $request->tglsidi,
                'pendeta_sidi' => $request->pendeta_sidi,
                'jemaat_id' =>$request->jemaat_id,
                'file' => $file_name,
                'tempat_sidi'=>$request->tempat_sidi,
            ]); 
    }
    else
    {
        $output->writeln("Check file !");
    }
        return redirect('/Sidi/index');
    }

 
    public function showPdf($tglsidi)
    {
         $path = 'file/'.$tglsidi;
 
         $file = '/'.DB::table('sidi')
                         ->where ('tglsidi', '=', $tglsidi)
                         ->pluck('file')[0];
 
     return response()->file($path.$file);
    //return response()->donwload($path.$file);
   
    }
 


public function edit($id) {
    $j = jemaat::all();
    $s= sidi::findOrFail($id);
    $b= Baptis::all();
    
        return view('Sidi.editSidi', compact('s','j','b'));
  
}

public function update($id, Request $request) {
    
    $si = jemaat::find($id);
    $si = sidi::find($id);

  
    $si->waktu_sidi =$request->input('waktu_sidi');
    $si->hari_sidi = $request->input('hari_sidi');
    $si->tglsidi= $request->input('tglsidi');
    $si->tempat_sidi = $request->input('tempat_sidi');
    $si->pendeta_sidi = $request->input('pendeta_sidi');
   
        $si->update();

    return redirect('/Sidi/index')->with('status', 'Berhasil diupdate!');

}
}