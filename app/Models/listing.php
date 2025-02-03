<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class listing extends Model
{
    use HasFactory,FilterQueryString;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'price',
        'currency_id',
        'category_id',
        'region_id',
        'status',
        'primary_image'
    ];

    protected $filters = ['user_id','sort'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(image::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
