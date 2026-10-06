<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
     protected $fillable = ['name','email','password','membership_id'];

    public function membership() {
        return $this->belongsTo(Membership::class);
    }
    public function sessions() {
        return $this->hasMany(Session::class);
    }
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
