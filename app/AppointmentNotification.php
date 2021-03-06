<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentNotification extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
