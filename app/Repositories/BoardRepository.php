<?php

namespace App\Repositories;

use App\Repositories\Contract\BoardContract;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;

class BoardRepository implements BoardContract
{
    public function registBoard($request)
    {
        $board = new Board();
        $board->title = $request->title;
        $board->color = $request->color;
        $board->user_id = Auth::user()->id;
        $board->save();
    }

    public function deleteBoard($board)
    {
        $board = Board::findOrFail($board)->first();
        $board->delete();
    }
}
