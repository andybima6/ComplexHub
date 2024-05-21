<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKk extends Model
{
    use HasFactory;

    protected $table = 'data_kk';

    public function rt()
    {
        return $this->belongsTo(DataRt::class, 'data_rt_id');
    }

    public function penduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'data_kk_id');
    }
}
