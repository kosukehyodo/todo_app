<?php

namespace App\Repositories\Contract;

interface BoardContract
{
    /**
     * ボードの新規登録.
     */
    public function registBoard($request);
}
