<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'name',
        'field',
        'laporan',
        'status',
        'rt_id',
    ];
    protected $attributes = [
        'status' => 'Pending',

    ];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
}


