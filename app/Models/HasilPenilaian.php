<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternative_id',
        'biaya_tiket_masuk',
        'fasilitas',
        'kebersihan',
        'keamanan',
        'biaya_akomodasi',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }
}
