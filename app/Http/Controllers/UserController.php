<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Repositories\Contract\UserContract;

class UserController extends Controller
{
    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $authinfo = [
            'email' => $request->email,
            'password' => $request->password,
            ];
            if (Auth::attempt($authinfo)) {
                $user = Auth::user();
                //redirect()->route('board.index')->with('user', $user)だと次のページで＄userが取れなかった。
                return view('user.index')->with('user', $user);
            } else {
                return redirect()->back()->with('message', 'Failed to login!');
            }
        }
    }

    public function login()
    {
        return view('user.login');
    }

    public function store(UserRequest $request)
    {
        return $this->user->registUser($request);
    }

    public function add()
    {
        return view('user.add');
    }
}
