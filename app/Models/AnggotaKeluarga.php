<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $fillable = ['nama', 'tanggal_lahir', 'hubungan_keluarga', 'kk_id'];

    public function dataKartuKeluarga()
    {
        return $this->belongsTo(DataKartuKeluarga::class, 'kk_id');
    }
}
