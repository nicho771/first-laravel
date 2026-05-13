<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        //mengambil semua data karyawan menggunakan ORM
        $karyawan = Karyawan::all();

        //mengirim data ke view
        return view('karyawan.index', ['karyawan' => $karyawan]);

    }
    
    //Fungsi Tambah
    public function tambah()
    {
        //memanggil view tambah
        return view('karyawan.tambah');
    }

    //Method untuk insert data ke table Karyawan
    public function store(Request $request)
    {
        //insert data ke table karyawan menggunkan ORM
        Karyawan::create([
            'karyawan_nama' => $request->nama,
            'karyawan_jabatan' => $request->jabatan,
            'karyawan_umur' => $request->umur,
            'karyawan_alamat' => $request->alamat
        ]);

        return redirect('/karyawan');
    }

    //Fungsi Edit 
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);   // Mengambil data berdasar ID menggunakan Eloquent

        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', ['karyawan' => $karyawan]); // Tampilkan view edit dan kirim data karyawan return view
    }
    
    // Method untuk proses edit data
    public function update(Request $request, $id)
    {
        // Validasi Data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'umur' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        // Update data karyawan di Database
        DB::table('karyawan')->where('karyawan_id', $id)->update([
            'karyawan_nama' => $request->nama,
            'karyawan_jabatan' => $request->jabatan,
            'karyawan_umur' => $request->umur,
            'karyawan_alamat' => $request->alamat
            ]);

        // Redirect ke halaman Karyawan.index
        return redirect('/karyawan')->with('success', 'Selamat Data Karyawan Anda berhasil diUpdate');
    }

    // Fungsi hapus data
    public function hapus($id)
    {
        $karyawan = Karyawan::find($id);
        //alihkan ke halaman karyawan
        $karyawan->delete();
        return redirect('/karyawan');
    }
}
