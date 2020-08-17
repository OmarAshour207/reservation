<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamMember extends Model
{
    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'role', // 0 => SuperAdmin(Doctor), 1 => Doctor, 2 => Nursery
        'image'
    ];

    // Attributes
    public function getMemberImageAttribute()
    {
        return Storage::url('public/team-members/' . $this->image);
    }
}
