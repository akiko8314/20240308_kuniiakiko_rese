<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $shopId = $request->id;

            $existingFavorite = Favorite::where('user_id', $userId)
            ->where('shop_id', $shopId)
            ->first();

            if ($existingFavorite) {
                $existingFavorite->delete();
                return redirect()->back()->with('success', 'お気に入りを解除しました。');
            } else {
                $favorite = new Favorite();
                $favorite->user_id = $userId;
                $favorite->shop_id = $shopId;
                $favorite->save();
                return redirect()->back()->with('success', 'お気に入りに登録しました。');
            }
        } else {
            return redirect()->route('login')->with('error', 'お気に入り登録するにはログインが必要です。');
        }
    }
}
