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
        'user_id',
        'nama',
        'periode',
        'total',
        'keterangan',
        'bukti',
        'rt_id',
        'status',
    ];

    protected $attributes = [
        'status' => 'diproses',
    ];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
}
