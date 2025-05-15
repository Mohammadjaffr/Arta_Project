<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaAccounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'snapchat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
