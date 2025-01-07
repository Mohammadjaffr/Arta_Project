<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Complaint extends Model
{
    use HasFactory,FilterQueryString;

    protected $fillable = [
        'user_id',
        'listing_id',
        'content',
    ];

    protected $filters = ['user_id','listing_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
