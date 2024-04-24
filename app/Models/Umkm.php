<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    // use HasFactory;
    protected $fillable = ['namaLengkap', 'NIK', 'namaUsaha', 'deskripsiUsaha', 'fotoProduk'];

}
