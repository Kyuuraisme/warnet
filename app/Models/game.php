<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
     protected $fillable = ['title','genre'];

    public function sessions() {
        return $this->hasMany(Session::class);
    }
}
