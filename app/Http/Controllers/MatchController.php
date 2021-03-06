<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;

class MatchController extends Controller
{
    public function index()
    {
        // 自分へいいねしたユーザー所得した後その中で自分もいいねしたIDs
        $likedUserIds = Swipe::where('to_user_id', \Auth::user()->id)
                        ->where('is_like', true)
                        ->pluck('from_user_id');

        $matchedUsers = Swipe::where('from_user_id', \Auth::user()->id)
                        ->whereIn('to_user_id', $likedUserIds)
                        ->where('is_like', true)
                        ->with('toUser')
                        // ここを変更
                        // ->get();
                        ->first();

        // dd($matchedUsers);

        // これ多分違う！
        return view('pages.match.index', [
            'matchedUsers' => $matchedUsers,
            // 'likedUserIds' => $likedUserIds
        ]);
    }
}
