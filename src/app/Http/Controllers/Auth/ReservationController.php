<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shop.detail', ['shop' => $shop]);
    }
    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->party_size = $request->party_size;
        $reservation->save();

        return redirect()->back()->with('success', '予約が成功しました！');
    }
}
