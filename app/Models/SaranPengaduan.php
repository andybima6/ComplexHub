<?php

// app/Models/SaranPengaduan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranPengaduan extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'jenis', 'warga_id', 'rt_tanggapan', 'rw_tanggapan'];

    public function warga()
    {
        return $this->belongsTo(User::class, 'warga_id');
    }
}
