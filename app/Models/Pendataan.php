<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataan extends Model
{
    // use HasFactory;

    protected $table = 'pendataan';
    protected $fillable = ['nama_rt', 'rt-', 'periode jabatan', 'foto_rt'];
}
