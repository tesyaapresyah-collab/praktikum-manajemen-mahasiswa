<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit (opsional karena secara default Laravel menggunakan bentuk plural 'mahasiswas')
    protected $table = 'mahasiswas';

    // Daftar kolom yang diizinkan untuk mass assignment (isi data secara massal)
    protected $fillable = [
        'nim',
        'nama',
        'program_studi',
        'email',
        'angkatan',
    ];
}