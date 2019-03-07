<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['title', 'color', 'user_id'];

    public function users()
    {
        return $this->belongsTo('APP\Models\User');
    }
}
