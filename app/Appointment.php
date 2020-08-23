<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'user_id',
        'day',
        'appointment',
        'status',
        'price'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Admin', 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
