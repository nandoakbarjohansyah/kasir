<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'menus';
    protected $fillable = ['id', 'nama_menu', 'harga', 'tipe_id', 'created_at', 'updated_at'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function menu()
    {
        return $this->hasMany(Pesanan::class);
    }
}
