<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        //Mengambil semua data siswa
        $siswa = Siswa::all();
        
        //Mengirim data siwa ke view
        return view('siswa.index', ['siswa'=>$siswa]);


    }

    
}
