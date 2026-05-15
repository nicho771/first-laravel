<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Support\Facades\Storage;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
	return view('welcome');
});


Route::get('boostrap', function () {
	return view('boostrap');
});

//Route untuk menampilkan tampilan halo
Route::get('halo', function () {
	return "Hello World. Selamat datang halaman Tutorial Belajar Laravel Serie 1";
});

//Route untuk menampilkan tampilan kontak
Route::get('kontak', function () {
	return view('kontak');
});

// Route untuk menampilkan data siswa
Route::get('/siswa', [SiswaController::class, 'index']);

// Route untuk menampilkan data Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

// Route untuk menampilkan data Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/simpan', [PegawaiController::class, 'simpan']);

Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);

Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);

// Route untuk menampilkan berita dengan pagination
Route::get('/berita', [PostController::class, 'index'])->name('beritas.index');



// Route untuk menapilkan data Karyawan (Eloquent ORM)
Route::get('/karyawan', [KaryawanController::class, 'index']);
// Route untuk menambah data karyawan (Eloquent ORM)
Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);

Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update']);

Route::get('/karyawan/hapus/{id}', [KaryawanController::class, 'hapus']);

// Route untuk menampilkan form Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

// Route Login pada Materi Multi User Role
Route::get('/', [LoginController::class, 'view']);
// Route::post('login', [LoginController::class, 'login'])->name('login');
// Route untuk mengatur fungsi logout agar bisa digunakan
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Role Views
Route::middleware(['auth', 'checkrole:superadmin'])->get('/superadmin', function () {
	return view('superadmin');
});
Route::middleware(['auth', 'checkrole:penulis'])->get('/penulis', function () {
	return view('penulis');
});

// Route untuk menampilkan form dan memproses login oleh google API
Route::get('/setelahlogin', function () {
	return view('setelahlogin');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('auth', [LoginController::class, 'redirectToProvider'])->name('auth');
Route::get('auth/google', [LoginController::class, 'handleProviderCallback'])->name('auth.google');

// Route untuk menjalakan Controller Forgot Password
Route::get('/forgot-password', function () {
	return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [
	ForgotPasswordController::class,
	'sendResetLinkEmail'
])->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
	return view('auth.reset-password', [
		'token' => $token
	]);
})->name('password.reset');

Route::post('/reset-password', [
	ForgotPasswordController::class,
	'resetPassword'
])->name('password.update');


// Route untuk menjalankan upload file
Route::get('/upload', function () {
	return view('upload');
});

Route::post('/upload', function (Request $request) {
	//Validasi File 
	$request->validate([
		'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
	]);

	//simpan file ke storage app/public/uploads
	$path = $request->file('file')->store('uploads', 'public');

	return back()->with('success', 'File berhasil diupload')->with('file', $path);
});

// Route untuk menjalankan Upload file dengan Database

Route::get('/uploads', [FileController::class, 'index']);
Route::post('/uploads', [FileController::class, 'store']);
