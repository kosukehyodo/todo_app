<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\User;
use App\Repositories\Contract\UserContract;

class UserController extends Controller
{
    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
    }

    public function index()
    {
        return View('user.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $authinfo = [
            'email' => $request->email,
            'password' => $request->password,
            ];
            if (Auth::attempt($authinfo)) {
                $user = Auth::user();

                return redirect()->route('user.profile')->with('user', $user);
            } else {
                return redirect()->back()->with('message', 'failed to login！');
            }
        }
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(UserRequest $request)
    {
        return $this->user->registUser();
    }

    public function profile()
    {
        return view('user.profile');
    }
}
