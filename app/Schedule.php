<?php

namespace App;

use App\Doctor;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'doctor_id', 'day', 'start_time', 'end_time',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
