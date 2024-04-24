<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    protected $table = 'data_penduduk';

    public function rt()
    {
        return $this->belongsTo(DataRt::class, 'rt_id');
    }

    public function kk()
    {
        return $this->belongsTo(DataKk::class, 'data_kk_id');
    }
}
