<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id','latitude','longitude'];

    public function children()
    {
        return $this->hasMany(Region::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Region::class, 'parent_id')->withDefault(['name'=>'لايوجد']);
    }
}
