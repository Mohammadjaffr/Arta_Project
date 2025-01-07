<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Comment extends Model
{
    use HasFactory,FilterQueryString;

    protected $fillable = [
        'listing_id',
        'user_id',
        'content',
    ];

    protected $filters = ['listing_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
