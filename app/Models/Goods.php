<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'nama_barang',
        'kategori',
        'tgl_pembelian',
    ];

    public function track()
    {
        return $this->hasOne(Track::class, 'goods_id');
    }
}
