<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class PostController extends Controller
{
    public function index(Request $request) {
        //ambil keyword dari request untuk fitur search
        $search = $request->input('search'); 
        //ambil data dari post dengan pagination

        //Query data berdasarkan keyword atau tampilan semua jika tidak ada pencarian
        $beritas = Berita::when($search, function($query, $search){
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
        })->paginate(5);


        //mengembalikan view dan mengirim data Post
        return view('berita_index', compact('beritas'));
    }
}
