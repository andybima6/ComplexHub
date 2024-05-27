<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'criteria';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kriteria',
        'jenis',
        'bobot'
    ];


    // public function criteria()
    // {
    //     return $this->hasMany(Criteria::class);
    // }
}
