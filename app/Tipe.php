<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $table = 'tipes';
    protected $fillable = ['id', 'tipe_makanan', 'created_at', 'updated_at'];

    public function menu(){
        return $this->hasMany(Product::class);
    }
}
