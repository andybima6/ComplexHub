<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'keterangan',
        'document',
        'comment',
        'status',
        'rt_id',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
}
