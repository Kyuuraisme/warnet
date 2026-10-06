<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class computer extends Model
{
    protected $fillable = ['code','specs','is_available'];

    public function sessions() {
        return $this->hasMany(Session::class);
    }
}
