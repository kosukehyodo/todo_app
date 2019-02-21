<?php

namespace App\Repositories;

use App\Repositories\Contract\UserContract;
use App\Models\User;

class UserRepository implements UserContract
{
    public function registUser($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/')->with('message', 'Success to Regist!');
    }
}
