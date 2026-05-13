<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil semua data pegawai
        $pegawai = DB::table('pegawai')->get();

        // Mengirim data ke view
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    //fungsi operasi
    public function tambah()
    {
        // memanggil view tambah
        return view('pegawai.tambah');
    }

    //Method simpan
    public function simpan(Request $request)
    {
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    // fungsi untuk melakukan edit
    public function edit($id)
    {
        // digunakan u, Ambil data pegawai berdasarkan id
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->first();


        // Digunakan u, tampilkan view edit dan kirim data pegawai
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }
    //Method edit
    // Membuat method proses edit data
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'umur' => 'required|integer|min:18',
            'alamat' => 'required|string',
        ]);

        // Update data pegawai di database
        DB::table('pegawai')->where('pegawai_id', $id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
        ]);

        //Setelah itu redirect kembali ke halaman utama data pegawai
        return redirect('/pegawai')->with('success', 'Selamat Data pegawai Anda berhasil diupdate');
    }

    //fungsi untuk melakukan Hapus
    public function hapus($id)
    {
        // Hapus data pegawai berdasarkan id
        DB::table('pegawai')->where('pegawai_id', $id)->delete();

        // Alihkan kembali ke halaman utama
        return redirect('/pegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}
