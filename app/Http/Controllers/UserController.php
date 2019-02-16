<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\User;

class UserController extends Controller
{
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
                //return redirect()->route(user.profile)->with('user', $user)とするとundefinedを起こす！？
                return view('user.profile')->with('user', $user);
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/')->with('message', 'Success to Regist!');
    }

    public function profile()
    {
        return view('user.profile');
    }
}
