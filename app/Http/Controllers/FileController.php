<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('uploads', compact('files'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        //simpan file ke storage/app/public/uploads
        $path = $request->file('file')->store('uploads', 'public');

        //simpan ke database
        $file = new File();
        $file->name = $request->file('file')->getClientOriginalName();
        $file->path = $path;
        $file->save();

        return back()->with('success', 'file berhasil di upload!'); 
    }

    
}
