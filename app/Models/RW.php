<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;
    protected $table = 'rts';


    protected $fillable = ['nama', 'rt_id', 'alamat', 'nomor_telefon'];

    public function dataKartuKeluargas()
    {
        return $this->hasMany(DataKartuKeluarga::class);
    }
    public function rt()
    {
        return $this->hasMany(suggestion::class, 'rt_id');
    }
    public function activities()
    {
        return $this->hasMany(RT::class, 'rt_id');
    }
    public function rts()
    {
        return $this->hasMany(RT::class);
    }

}

