<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
 
class UploadController extends Controller
{
     public function index()
    {
        return view('file-upload');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
         'dokumen' => 'required|csv,txt,xlx,xls,pdf|max:2048',
 
        ]);
 
        $name = $request->file('dokumen')->getClientOriginalName();
 
        $path = $request->file('dokumen')->store('public/files');
 
 
        $save = new File;
 
        $save->name = $name;
        $save->path = $path;
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel');
 
    }
}