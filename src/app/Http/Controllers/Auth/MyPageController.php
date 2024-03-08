<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $reservations = Reservation::where('user_id', auth()->id())->get();
        $favorites = Favorite::all();

        return view('auth.my_page', [
            'reservations' => $reservations,
            'favorites' => $favorites
        ]);
    }
}
