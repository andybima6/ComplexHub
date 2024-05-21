<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'document',
        'comment',
        'status',
        'rt_id',
    ];

    public function rt()
    {
        return $this->belongsTo(DataRt::class, 'rt_id');
    }
}
