<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo('APP\Models\User');
    }

    public function color()
    {
        return $this->hasOne('App\Models\Color');
    }
}
