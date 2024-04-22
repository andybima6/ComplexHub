<?php

namespace App\Models;

use App\Models\DataKk;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'kk_id',
        'gender',
        'usia',
        'tmp_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'status_pernikahan',
        'status_keluarga',
        'pekerjaan',
    ];

    public function dataKk()
    {
        return $this->belongsTo(DataKk::class);
    }
}
