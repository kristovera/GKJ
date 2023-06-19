<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\kematian;
use App\Models\jemaat;

class MatiController extends Controller
{
    
    public function index()
    {
        
        $ke = DB::table('jemaat')
        ->join('mati','jemaat.id','mati.jemaat_id')
      
        ->get();
    
    
         return view('Kematian.index',compact('ke'));
    
    }
    
    public function create() {
        $jemaat = jemaat::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('mati')
            ->whereRaw('mati.jemaat_id = jemaat.id');
         })->get(); 

        return view('Kematian.create', compact('jemaat'));
    }

    public function store(Request $request) {
        $data = new kematian();
        $data->usia_mati = request('usia_mati');
        $data->wafat = request('wafat');
        $data->tempat_mati = request('tempat_mati');
        $data->pendeta = request('pendeta');
     
        $data->jemaat_id = request('jemaat_id');
        $data->save();
        return redirect('/Kematian/index');
    }
    
    public function editkem($id) {

        $jemaat= jemaat::all();
        $k = kematian::findOrFail($id);
     //   dd($m);
       return view('Kematian.edit', compact('k','jemaat'));
      }
  
      public function delete($id)
      {
          $k= kematian::find($id);
          $k->delete();
  
          return redirect('/Kematian/index')->with('success', 'Jemaat removed.');  
      }

      public function update(Request $request, $id) {
 
      
         $ke = kematian::find($id);
  
          $ke->usia_mati=request('usia_mati');
          $ke->pendeta=request('pendeta');
          $ke->tempat_mati=request('tempat_mati');
       
          $ke->jemaat_id = request('jemaat_id');
   
        $ke->update();
  
        return redirect('/Kematian/index');
     
      }
  
    


     
   
}
