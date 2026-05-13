<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan'; // Menyesuaikan dengan nama tabel pada database

    protected $fillable = [
    'karyawan_nama',
    'karyawan_jabatan',
    'karyawan_umur',
    'karyawan_alamat'
    ];

    protected $primaryKey = 'karyawan_id';
}
