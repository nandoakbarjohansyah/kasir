<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['id', 'role', 'user_id'];
}
