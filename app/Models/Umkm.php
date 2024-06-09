<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    // use HasFactory;

    protected $table = 'umkm';
    protected $fillable = ['user_id', 'nama_warga', 'nama_usaha', 'deskripsi', 'foto_produk', 'status_rt', 'status_rw','rt_id'];
    protected $attributes = [
        'status_rt' => 'izin belum disetujui oleh ketua RT',
        'status_rw' => 'izin belum disetujui oleh ketua RW'
    ];
    public function umkm()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
