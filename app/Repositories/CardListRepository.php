<?php

namespace App\Repositories;

use App\Repositories\Contract\CardListContract;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use App\Models\CardList;

class CardListRepository implements CardListContract
{
    /**
     * リストを追加
     */
    public function createCardList($request)
    {
        return
            CardList::create([
                    'board_id' => $request->board_id,
                    'title'    => $request->title
                ]);
    }

    public function getCardList($board)
    {
        return
            CardList::where('board_id', $board->id)->get();
    }
}
