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

        return redirect()->route('board.show', $board->id);
    }

    public function deleteBoard($board)
    {
        $board = Board::findOrFail($board)->first();
        $board->delete();
        $data = Board::all();

        // return redirect()->back()->with('data', $data);
        return view('welcome')->with('data', $data);
    }
}
