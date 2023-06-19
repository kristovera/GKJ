<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
 
class FileController extends Controller
{
     public function index()
    {
        return view('file-upload');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
         'file' => 'required|pdf|max:2048',
         
 
        ]);
 
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/file');
 
 
        $save = new File;
 
        $save->name = $name;
        $save->path = $path;
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel');
 
    }
}