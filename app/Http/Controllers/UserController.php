<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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
        $user = User::where('id', '<>', \Auth::user()->id)->first();
        return view('pages.user.index',[
            'user' => $user
        ]);
    }
}
