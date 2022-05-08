<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Categories','categories_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\comments');
    }
}
