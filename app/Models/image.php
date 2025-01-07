<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'path',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
