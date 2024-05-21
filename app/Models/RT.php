<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = 'rts';


    protected $fillable = ['nama', 'rt', 'alamat', 'nomor_telefon'];

    public function dataKartuKeluargas()
    {
        return $this->hasMany(DataKartuKeluarga::class);
    }
}
