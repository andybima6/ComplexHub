<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'kk_id',
        'nama',
        'nik',
        'alamat',
        'tanggal_lahir',
        'hubungan_keluarga',
        'status_perkawinan',
        'jenis_kelamin',
        'golongan_darah',
    ];

    public function dataKartuKeluarga()
{
    return $this->belongsTo(DataKartuKeluarga::class, 'kk_id');
}
}
