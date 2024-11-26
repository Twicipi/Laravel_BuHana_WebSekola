<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 't_kelas';
    protected $fillable = ['lokasi_ruangan', 'kelas', 'jurusan', 'nama_wali_kelas'];
}
