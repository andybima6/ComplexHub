<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $fillable = [
        'alternative',
        'criteria',
        'penilaian',
        'bobot',
        'ranking',
        'status',
        'rw_id',
    ];

    public function rw()
    {
        return $this->belongsTo(Destinasi::class, 'rw_id');
    }
}
