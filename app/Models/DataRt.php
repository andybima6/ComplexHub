<?php
namespace App\Models;

use App\Models\Activity;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // public function DataPenduduk()
    // {
    //     return $this->hasMany(DataPenduduk::class, 'data_rt');
    // }

    // public function DataKk()
    // {
    //     return $this->hasMany(DataKk::class, 'data_rt');
    // }
}
