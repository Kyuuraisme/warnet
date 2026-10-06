<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shift extends Model
{
    protected $fillable = ['employee_id','shift_date','start_time','end_time'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
