<?php

namespace App\Repositories\Contract;

interface BoardContract
{
    /**
     * ボードの新規登録.
     */
    public function registBoard($request);

    /**
     * ボードの削除.
     */
    public function deleteBoard($board);

    /**
     * ログインユーザーのボード取得.
     * @param $id
     */
    public function getBoard($id);
}
