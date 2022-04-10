<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;


class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // User::find(1) はエロクエント経由でUserクラスの情報を持ってくる！
        // $user = User::find(1);
        // authUser（ログインユーザー） でないユーザー情報を受け取る,秘湯の場合first()、複数でget()
        // $user = User::where('id', '<>', \Auth::user()->id)->first();

        // Plan2 - 既にスワイプしたユーザーを省いて、スワイプしていないユーザーを一つ所得 = (分けて考えて、)

        // 既にスワイプしたユーザーIDを受け取って、
        $swipedUserIds = Swipe::where('from_user_id', \Auth::user()->id)->get()->pluck('to_user_id');

        // この中からスワイプしていないユーザーを受け取る
        $user = User::where('id', '<>', \Auth::user()->id)->whereNotIn( 'id', $swipedUserIds)->first();

        return view('pages.user.index',[
            'user' => $user
        ]);
    }

    public function logout()
    {
        return view('layouts.app');
    }
}
