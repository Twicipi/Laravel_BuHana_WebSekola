<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 't_guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'alamat'
    ];
}
