<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $user = Auth::user();
        $favorites = $user ? $user->favorites : [];

        return view('auth.shop_list', compact('shops', 'favorites'));
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        $reservations = Reservation::where('shop_id', $id)->get();
        return view('auth.shop_detail', compact('shop', 'reservations'));
    }

    public function favorite(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $favorite = Favorite::where('user_id', $userId)->where('shop_id', $id)->first();
            if ($favorite) {
                $favorite->delete();
                return redirect()->back()->with('success', 'お気に入りを解除しました。');
            } else {
                $favorite = new Favorite();
                $favorite->user_id = $userId;
                $favorite->shop_id = $id;
                $favorite->save();

                return redirect()->back()->with('success', 'お気に入りに登録しました。');
            }
        } else {
            return redirect()->route('login')->with('error', 'お気に入り登録するにはログインが必要です。');
        }
    }
    public function search(Request $request)
    {
        $area = $request->input('area_id');
        $genre = $request->input('genre_id');
        $keyword = $request->input('keyword');

        $shops = Shop::query()
            ->byArea($area)
            ->byGenre($genre)
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->get();

        $favorites = Auth::user() ? Auth::user()->favorites : [];

        return view('auth.shop_list', compact('shops', 'favorites'));
    }
}

