@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="icon__box">
        <a href="{{ route('main_menu') }}">
            <div class="menu__icon">
                <div></div>
            </div>
        </a>
    </div>
    <h1>Rese</h1>
</header>
@endsection

@section('main')

<h2 class="user__name">{{ auth()->user()->name }}さん</h2>
<div class="reservation__box">
    <h3 class="reservation__title">予約状況</h3>
    <div class="reservation__detail--box">
        @if($reservations->isEmpty())
        <p>現在の予約はありません。</p>
        @else
        @foreach($reservations as $key => $reservation)
        <div class="reservation__detail">
            <h4 class="reservation__number">予約{{ $key + 1 }}</h4>
            <table class="reservation__table">
                <tr>
                    <th>Shop</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>PartySize</th>
                </tr>
                <tr>
                    <td>{{ $reservation->shop_name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->party_size }}人</td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif
    </div>
</div>

<div class="favorite__box">
    <h3>お気に入り店舗</h3>
    <div class="favorite__card--box">
        @if($favorites->isEmpty())
        <p>お気に入りに登録された飲食店はありません。</p>
        @else
        @foreach($favorites as $favorite)
        <div class="card-body">
            <h4 class="shop__name">{{ $favorite->shop_name }}</h4>
            <p class="card__text--area">#{{ $favorite->area }} - {{ $favorite->genre }}</p>
            <p class="card__text--genre">#{{ $favorite->genre }}</p>
            <div class="shop__detail--button">
                <a href="">詳しく見る</a>
            </div>
            <div class="favorite__mark"></div>
        </div>
        @endforeach
        @endif
    </div>
</div>


@endsection