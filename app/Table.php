<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'meja';
    protected $fillable = ['id', 'meja', 'status'];

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class);
    }
}
