<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ClientHistory extends Model
{
    protected $fillable = [
        'ar_case',
        'en_case',
        'ar_description',
        'en_description',
        'image',
        'user_id',
        'doctor_id'
    ];

    // Attributes

    public function getHistoryImageAttribute()
    {
        return Storage::url('public/clients-histories/' . $this->image);
    }

    // Relations
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Admin', 'doctor_id');
    }

    // Scopes
    public function ScopeWhenSearch($query, $search)
    {
        return $query->when($search, function($q) use ($search){
            return $q->whereHas('user', function ($qu) use ($search){
                $qu->where('name', 'like', "%$search%");
            });
        });
    }

}
