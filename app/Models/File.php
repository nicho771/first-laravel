<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class File extends Model
{
    use HasFactory;
	
    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['name', 'path'];

}
