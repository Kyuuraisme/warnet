<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = ['name','position','phone'];

    public function shifts() {
        return $this->hasMany(Shift::class);
    }
}
