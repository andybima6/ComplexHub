<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    // use HasFactory;

    protected $table = 'umkm';
    protected $fillable = ['nama_warga', 'nama_usaha', 'deskripsi', 'foto_produk', 'status_rt', 'status_rw'];
    protected $attributes = [
        'status_rt' => 'izin belum disetujui oleh ketua RT',
        'status_rw' => 'izin belum disetujui oleh ketua RW'
    ];
}
