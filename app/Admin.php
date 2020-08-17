<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'role' // 0 => SuperAdmin(Doctor), 1 => Doctor, 2 => Nursery
    ];

    protected $hidden = [
        'remember_token',
        'password'
    ];

    public function getAdminImageAttribute()
    {
        return Storage::url('public/accounts/' . $this->image);
    }

}
