<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $fillable=[
        'latitude',
        'longitude',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
