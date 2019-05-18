<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    protected $fillable = ['board_id','title'];

    public function users()
    {
        return $this->belongsTo('APP\Models\Board');
    }
}
