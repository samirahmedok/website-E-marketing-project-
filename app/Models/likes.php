<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function comments()
    {
        return $this->belongsTo('App\Models\comments');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
