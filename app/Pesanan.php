<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = ['id', 'menu_id', 'pelanggan_id', 'user_id', 'jumlah', 'created_at', 'updated_at'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Product::class);
    }
}
