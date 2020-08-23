<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'doctor_id',
        'day',
        'start_time',
        'end_time',
        'waiting_time',
        'price',
        'creator'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Admin', 'doctor_id');
    }

}
