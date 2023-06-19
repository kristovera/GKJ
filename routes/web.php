<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\SidiController;
use App\Http\Controllers\BaptisController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MatiController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PieController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\IstriController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UploadController;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', function () {
    return view('welcome');
})->name('/');


Auth::routes();

//file

Route::get('file', [FileController::class, 'index']);
Route::get('file', [UploadController::class, 'index']);
Route::post('store', [UploadController::class, 'store']);
Route::post('store', [FileController::class, 'store']);

Route::get('/baptis', 'UploadController@baptis');
Route::post('/Baptis/proses', 'UploadController@proses_upload');

// Route::group(['middleware' => ['auth','pegawai']], function()
// {
//     Route::get('/home', [HomeController::class,'index'])->name('home');
//     Route::get('/jemaat/index', [JemaatController::class,'jemaat']);
//     Route::get('/jemaat/tambah_jem', [JemaatController::class,'index']);
//     Route::post('/jemaat/tambah_jem/simpan', [JemaatController::class,'simpan_jem']);
//     Route::get('/jemaat/edit/showPdf/{induk}', [JemaatController::class, 'showPdf'])->name('jemaat.showPdf');
//
//     Route::get('/jemaat/edit/{id}', [JemaatController::class,'edit']);
//     Route::put('/jemaat/ubah/{id}', [JemaatController::class,'update']);
//     Route::get('/jemaat/delete/{id}', [JemaatController::class,'destroy']);
//
//     Route::get('/Baptis/index', [BaptisController::class,'tampil']);
//     Route::get('/Baptis/create', [BaptisController::class,'create']);
//     Route::post('/Baptis/create/simpan', [BaptisController::class,'store']);
//
//     Route::get('/Baptis/edit_bap/{id}', [BaptisController::class,'edit']);
//     Route::put('/Baptis/ubah/{id}', [BaptisController::class,'update']);
//
// });

Route::group(['middleware' => ['auth']], function()
{
    //ADMIN

    //Route::group(['middleware'=> ['admin']], function () {

    //Route::middleware(['auth', 'admin'])->name('login')->group(function () {


    Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('/pie', [PieController::class,'index']);
    Route::get('/das', [PieController::class,'perkawinan']);
    Route::get('/das/{year}', [PieController::class,'getYear'])->name("get.year");
    //Route::get('/pie', [PieController::class,'status']);

    Route::get('/jemaat/index', [JemaatController::class,'jemaat']);
    Route::get('/jemaat/tambah_jem', [JemaatController::class,'index']);
    Route::post('/jemaat/tambah_jem/simpan', [JemaatController::class,'simpan_jem']);
    Route::get('/jemaat/index/showPdf/{induk}', [JemaatController::class, 'showPdf'])->name('jemaat.showPdf');

    Route::get('/jemaat/edit/{id}', [JemaatController::class,'edit']);
    Route::put('/jemaat/ubah/{id}', [JemaatController::class,'update']);
    Route::get('/jemaat/delete/{id}', [JemaatController::class,'destroy']);

    //sidi
    Route::get('/Sidi/index', [SidiController::class,'tampil']);
    Route::get('/Sidi/tambah_sidi', [SidiController::class,'create']);
    Route::post('/Sidi/tambah_sidi/simpan', [SidiController::class,'store']);
    Route::get('/Sidi/index/showPdf/{tglsidi}', [SidiController::class, 'showPdf'])->name('sidi.showPdf');

  
    Route::get('/Sidi/editSidi/{id}', [SidiController::class,'edit']);
    Route::put('/Sidi/ubah/{id}', [SidiController::class,'update']);
    Route::get('/Sidi/delete/{id}', [SidiController::class,'destroy']);
    //Route::get('/Sidi/index/showPdf/{induk}', [SidiController::class, 'showPdf'])->name('sidi.showPdf');

    //kk
    Route::get('/KK/index', [KKController::class,'index']);
    Route::get('/KK/create', [KKController::class,'create']);
    Route::post('/KK/create/simpan', [KKController::class,'store']);
    Route::get('/KK/hapus/{id}', [KKController::class,'hapus']); //kepala keluarga
    Route::get('/KK/index/view/{id}', [KKController::class,'show']);
    Route::get('/KK/tambah_view/{id}', [KKController::class,'tambah_kk']);
    Route::post('/KK/index', [KKController::class,'simpan_kk']);

    Route::get('/Detail/edit/{id}', [KKController::class,'edit']);
    Route::put('/Detail/ubah/{id}', [KKController::class,'update']);

 

    //baptis
    Route::get('/Baptis/index', [BaptisController::class,'tampil']);
    Route::get('/Baptis/create', [BaptisController::class,'create']);
    Route::post('/Baptis/create/simpan', [BaptisController::class,'store']);

    Route::get('/Baptis/edit_bap/{id}', [BaptisController::class,'edit']);
    Route::put('/Baptis/ubah/{id}', [BaptisController::class,'update']);
    Route::get('/Baptis/index/showPdf/{tglbap}', [BaptisController::class, 'showPdf'])->name('baptis.showPdf');
    Route::get('/Baptis/delete/{id}', [BaptisController::class,'hapus']);
    //Route::put('/Baptis/update/{id}', [BaptisController::class,'update']);
   


    Route::get('/Kematian/index', [MatiController::class,'index']);
    Route::get('/Kematian/create', [MatiController::class, 'create']);
    Route::get('/Kematian/create/simpan', [MatiController::class, 'store']);
    Route::get('/Kematian/api/index',[MatiControllee::class, 'getAutocompleteData']);
    Route::get('/Kematian/edit/{id}', [MatiController::class,'editkem']);
    Route::put('/Kematian/updated/{id}', [MatiController::class,'update']);
    Route::get('/Kematian/hapus/{id}', [MatiController::class,'delete']);




    //Route::get('/pie', [PieController::class,'index']);

    //daftar


    Route::get('/Daftar/index', [DaftarController::class,'index']);
    Route::get('/Daftar/create', [DaftarController::class,'create']);
    Route::post('/Daftar/create/simpan', [DaftarController::class,'store']);
    
    Route::get('/Daftar/edit/{id}', [DaftarController::class,'edit']);
    Route::put('/Daftar/ubah/{id}', [DaftarController::class,'update']);


    Route::get('/Daftar/hapus/{id}', [DaftarController::class,'destroy']);


    //keluar
    Route::get('/Keluar/index', [KeluarController::class,'index']);
    Route::get('/Keluar/tambah', [KeluarController::class,'tambah']);
    Route::post('/Keluar/tambah/simpan', [KeluarController::class,'simpan']);
    Route::get('/Keluar/edit/{id}', [KeluarController::class,'edit']);
    Route::put('/Keluar/ubah/{id}', [KeluarController::class,'update']);
    Route::get('/Keluar/hapus/{id}', [KeluarController::class,'delete']);
    Route::get('/Keluar/index/showPdf/{id}', [KeluarController::class, 'showPdf'])->name('keluar.showPdf');
    


    //Route::post('/KK/index/view/{id}', [IstriController::class,'store']);

    //Route::get('/Detail/status/istri/{id}',[KKController::class,'sts_istri']);
    //Route::get('/status/update', [IstriController::class,'updateStatus'])->name('istri.update.sts_istri');


    ////PEGAWAI

    
    Route::get('/pegawai/cekjem', [PegawaiController::class,'jemaat']);
    
    
    Route::get('/pegawai/cekbap', [PegawaiController::class,'baptis']);
    Route::get('/pegawai/Verif_bap/{id}', [PegawaiController::class,'editBap']);
    Route::put('/pegawai/upbaptis/{id}', [PegawaiController::class,'upBap']);  
    Route::get('/pegawai/cekmasuk', [PegawaiController::class,'masuk']);
        
    Route::get('/pegawai/cekkeluar', [PegawaiController::class,'keluar']);
    Route::get('/pegawai/Verif_keluar/{id}', [PegawaiController::class,'edit_keluar']);
    Route::put('/pegawai/upKeluar/{id}', [PegawaiController::class,'UpKel']); 
            
    Route::get('/pegawai/ceksidi', [PegawaiController::class,'sidi']);
    Route::get('/pegawai/Verif_sidi/{id}', [PegawaiController::class,'editSidi']);
    Route::put('/pegawai/ubah/{id}', [PegawaiController::class,'upSidi']); 

    Route::get('/pegawai/cekkem', [PegawaiController::class,'mati']);
  //  Route::get('/pegawai/cekkartu', [PegawaiController::class,'kk']);
  
  //Route::get('/pegawai/cekkeluar/showPdf/{id}', [PegawaiController::class, 'showPdf'])->name('pegawai.showPdf');

});



