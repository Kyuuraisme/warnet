<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = ['name','price','is_member_only'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
