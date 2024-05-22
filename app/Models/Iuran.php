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
        'rt_id',
        'periode',
        'keterangan',
        'total',
        'bukti',
    ];

    // protected $attributes = [
    //     'keterangan' => 'Pending'
    // ];
    public function rt()
    {
        return $this->belongsTo(DataRt::class, 'rt_id');
    }
}
