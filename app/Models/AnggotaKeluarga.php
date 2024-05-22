<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik', // Tambahkan 'nik' ke dalam array fillable
        'alamat', // Tambahkan 'alamat' ke dalam array fillable
        'tanggal_lahir',
        'hubungan_keluarga', // Tambahkan 'hubungan_keluarga' ke dalam array fillable
        'status_perkawinan', // Tambahkan 'status_perkawinan' ke dalam array fillable
        'jenis_kelamin', // Tambahkan 'jenis_kelamin' ke dalam array fillable
        'golongan_darah', // Tambahkan 'golongan_darah' ke dalam array fillable
    ];

    public function dataKartuKeluarga()
    {
        return $this->belongsTo(DataKartuKeluarga::class, 'kk_id');
    }
}
