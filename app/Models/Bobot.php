<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $fillable = ['bobot', 'kriteria_id'];

    public function kriteria()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }
}
