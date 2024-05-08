<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    protected $fillable = [
        'tanggal',
        'name',
        'field',
        'laporan',
        'status',
        'rt_id',
    ];

    public function rt()
    {
        return $this->belongsTo(DataRt::class, 'rt_id');
    }
}
