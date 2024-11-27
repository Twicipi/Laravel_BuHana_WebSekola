<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Tentukan nama tabel di database
    protected $table = 't_siswa';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenkel',
        'goldar',
    ];

    // Jika tabel menggunakan timestamp dan Anda tidak ingin menggunakannya
    public $timestamps = false;

    /**
     * Scope untuk pencarian data siswa berdasarkan nama atau jenis kelamin
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('nama_lengkap', 'LIKE', "%$search%")
                ->orWhere('jenkel', 'LIKE', "%$search%");
        }
        return $query;
    }
}
