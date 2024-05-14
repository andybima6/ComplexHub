<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'data_rt');
    }

    public function kriteria()
    {
        return $this->hasMany(kriteria::class, 'data_rt');
    }

    public function DataKk()
    {
        return $this->hasMany(DataKk::class, 'data_rt');
    }
}
