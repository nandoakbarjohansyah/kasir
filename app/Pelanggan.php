<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    protected $fillable = ['id', 'table_id', 'nama_pelanggan', 'jenis_kelamin', 'no_hp', 'alamat', 'created_at', 'updated_at'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
