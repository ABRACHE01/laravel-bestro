<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plate extends Model
{
    use HasFactory;
    protected $fillable=['name','price','coption','category_id','user_id','image'];
    protected $dates=['deleted_at'];
    // public function getImageAttribute()
    // {
    //     return asset('images'.$this->attributes['image']);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }
}

