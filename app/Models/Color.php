<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }
}
