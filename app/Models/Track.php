<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'goods_id',
        'cabang',
        'lantai',
        'ruangan',
        'tanggal',
        'kondisi',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
}
