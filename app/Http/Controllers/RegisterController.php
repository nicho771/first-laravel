<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        //Membuat tampilan Register
        return view('register.formregister');
    }

    public function register(Request $request)
    {
        // Insert data Form ke Database
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);
            
        // alihkan halaman ke halaman pegawai
        return redirect('/');
    }


}
