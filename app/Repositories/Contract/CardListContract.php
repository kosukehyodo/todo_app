<?php

namespace App\Repositories\Contract;

interface CardListContract
{
    /**
     * リストを追加
     */
    public function createCardList($request);

    /**
     * カードリストを取得
     */
    public function getCardList($board);

}
