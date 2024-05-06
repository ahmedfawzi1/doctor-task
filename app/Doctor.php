<?php

namespace App;

use App\Schedule;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
