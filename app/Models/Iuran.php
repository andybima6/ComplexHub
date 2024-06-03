<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'iuran';

    protected $fillable = [
        'nama',
        'periode',
        'total',
        'keterangan',
        'bukti',
        'rt_id',
        'status',
    ];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
}
