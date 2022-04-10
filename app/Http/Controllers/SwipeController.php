<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function store(Request $request){

        // dd($request->all());

        Swipe::create([
            'from_user_id' => \Auth::user()->id,
            'to_user_id' => $request->input('to_user_id'),
            'is_like' => $request->input('is_like'),
        ]);

        // 自分がスワイプした人からいいねが来ていたらマッチング
        $isMatch = $request->input('is_like') &&
        Swipe::where('from_user_id',$request->input('to_user_id'))
            ->where('to_user_id', \Auth::user()->id)
            ->where('is_like', true)
            ->exists();

        if ($isMatch) {
            return redirect(route('users.index'))->with('flash_message', 'マッチング成功！');
        }

        return redirect(route('users.index'));
    }
}
