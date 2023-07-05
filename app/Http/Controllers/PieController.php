<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function pie()
    {
        return view('pie');
    }

    
    function perkawinan()
    {
      $data = DB::table('jemaat')
       ->select(
        DB::raw('status_kawin as kawin'),
        DB::raw('count(*) as number'))
       ->groupBy('status_kawin')
       ->get();
     $array[] = ['Status Perkawinan', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->kawin, $value->number];
     }

     return view('das')->with('kawin', json_encode($array))->
     with('jum_sidi', json_encode((new PieController)->getData()))
    ->with('jk', json_encode((new PieController)->getJk()))
   -> with('status', json_encode((new PieController)->getStatus()))
    ->with('tahun', (new PieController)->getYearJemaat());
   // dd($array);
    }
    
    function jk()
    {
        $data = DB::table('jemaat')
            ->select(
            DB::raw('jk_jem as jk'),
            DB::raw('count(*) as number'))
            ->groupBy('jk_jem')
            ->get();

        $array[] = ['Jenis Kelamin', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->jk, $value->number];
        }

        return view('pie')->with('jk', json_encode($array));
        
   ///with('tahun', (new PieController)->getYearJemaat());
    }


    function status()
    {
      $data = DB::table('jemaat')
       ->select(
        DB::raw('status_as status'),
        DB::raw('count(*) as number'))
       ->groupBy('status_jem')
       ->get();
     $array[] = ['Status Jemaat', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->status, $value->number];
     }
     return view('pie')->with('status', json_encode($array));
    }

    function sidi()
    {
      $data = DB::table('jemaat')
       ->select(
        DB::raw('status_sidi','status_baptis'),
        DB::raw('count(*) as jumlah')
        )
       ->groupBy('status_sidi','status_baptis')
       ->get();
     $array[] = ['Status Data Sidi dan Baptis', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->verif, $value->number];
     }
   return view('das')->with('jumlah', json_encode($array));

  //dd($array);

    }
    ///SELECT status_sidi, status_baptis , count(*) as jumlah FROM jemaat GROUP BY status_sidi,status_baptis;

    function baptis()
    {
      $data = DB::table('jemaat')
       ->select(
        DB::raw('baptis.verif as bap'),
        DB::raw('count(*) as number')
        )
        ->join('baptis','baptis.jemaat_id','=','jemaat.id')
       ->groupBy('baptis.verif')
       ->get();
     $array[] = ['Status Data Baptis', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->bap, $value->number];
     }
   return view('das')->with('bap', json_encode($array));

  //dd($array);
    }
    
    
///STATIC
//SELECT SUM(IF(status_sidi='Sudah',1,0)) AS sidi, SUM(IF(status_baptis='Sudah',1,0)) AS bap FROM jemaat;
    
    public static function getData()
    {
        $data = DB::table('jemaat')
       ->select(
        DB::raw ('SUM(if(status_sidi = "Sudah",1,0)) as sidi'),
        DB::raw('SUM(if(status_baptis = "Sudah",1,0)) as baptis'),
       )
       ->get();

       $array[] = ['Sidi','Baptis'];

       foreach($data as $key => $value ){

        $array[++$key] = ["Sudah Sidi",(int) $value->sidi ];
        $array[++$key] = ["Sudah Baptis",(int) $value->baptis];
       }

   
         return $array;
     }
    


    public static function getJk()
    {
        $data = DB::table('jemaat')
            ->select(
            DB::raw('jk_jem as jk'),
            DB::raw('count(*) as number'))
            ->groupBy('jk_jem')
            ->get();

        $array[] = ['Jenis Kelamin', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->jk, $value->number];
        }

        return $array;
    }



    public static function getBap()
    {
      
        $data = DB::table('jemaat')
        ->select(
         DB::raw('baptis.verif as bap'),
         DB::raw('count(*) as number')
         )
         ->join('baptis','baptis.jemaat_id','=','jemaat.id')
        ->groupBy('baptis.verif')
        ->get();
      $array[] = ['Status Data Baptis', 'Number'];
      foreach($data as $key => $value)
      {
       $array[++$key] = [$value->bap, $value->number];
      }
   
         return $array;
    }

    public static function getStatus()
    {
        $data = DB::table('jemaat')
           ->select(
            DB::raw('status_jem as status'),
            DB::raw('count(*) as number'))
           ->groupBy('status_jem')
           ->get();
         $array[] = ['Status Jemaat', 'Number'];
         foreach($data as $key => $value)
         {
          $array[++$key] = [$value->status, $value->number];
         }

         return $array;
    }

    public static function getYearJemaat()
    {
        $data = DB::table('jemaat')->select('created_at as tahun')->whereYear('created_at','like','%')->
        orderBy('created_at','ASC')->get();

        $array[] = [];
        $i=0;
        foreach($data as $key => $value)
        {
            $date = new Carbon($value->tahun);

            if($i > 0 && $array[$i-1] != $date->year)
            {
                $array[$i++] = $date->year;
            }
            if($i == 0)
            {
                $array[$i++] = $date->year;
            }
        }

        return $array;
    }

    public static function getYear($year)
    {

        return response()->json([
            (json_encode((new PieController)::getGenderResponse($year))),
            (json_encode((new PieController)::getStatusResponse($year)))
        ],200);
    }

    public static function getStatusResponse($year)
    {
        $yearValue = $year == "Pilih tahun"? '%' : $year;
        $operator = $yearValue == '%'? 'like' : '=';
        $data_stat = DB::table('jemaat')
           ->select(
            DB::raw('statusgereja as status'),
            DB::raw('count(*) as number'))->whereYear('created_at', $operator, $yearValue)
           ->groupBy('statusgereja')
           ->get();

        $array_stat[] = ['Status Gereja', 'Number'];
        foreach($data_stat as $key => $value)
        {
            $array_stat[++$key] = [$value->status, $value->number];
        }

        return $array_stat;
    }

    public static function getGenderResponse($year)
    {
        $yearValue = $year == "Pilih tahun"? '%' : $year;
        $operator = $yearValue == '%'? 'like' : '=';
        $data_gender = DB::table('jemaat')
            ->select(
            DB::raw('jk_jem as jk'),
            DB::raw('count(*) as number'))->whereYear('created_at', $operator, $yearValue)
            ->groupBy('jk_jem')
            ->get();

        $array_gender[] = ['Jenis Kelamin', 'Number'];
        foreach($data_gender as $key => $value)
        {
            $array_gender[++$key] = [$value->jk, $value->number];
        }
        return $array_gender;
    }

}
