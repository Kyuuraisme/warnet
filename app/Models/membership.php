<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membership extends Model
{
    protected $fillable = ['type','discount'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
