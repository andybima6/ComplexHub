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

    public function activities()
    {
        return $this->hasMany(Activity::class, 'rt_id');
    }

    public function DataPenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'data_rt');
    }

    public function DataKk()
    {
        return $this->hasMany(DataKk::class, 'data_rt');
    }
}
