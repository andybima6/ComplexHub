<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'document',
        'status',
        'rt_id',
    ];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }

}
