<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRt extends Model
{
    use HasFactory;

    protected $table = 'data_rt';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'rt_id');
    }

    public function dataKk()
    {
        return $this->hasMany(DataKk::class, 'rt_id');
    }
}
