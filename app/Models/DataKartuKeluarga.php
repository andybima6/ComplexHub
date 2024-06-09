<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKartuKeluarga extends Model
{
    protected $fillable = ['kepala_keluarga', 'no_kk', 'rt_id', 'alamat']; // Add 'alamat' to the fillable array

    public function anggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'kk_id');
    }

    // Di model DataKartuKeluarga.php
    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }

    public function rw()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
}
