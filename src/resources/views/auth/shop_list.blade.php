@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_list.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="left__section">
        <div class="icon__box">
            <a href="{{ route('sub_menu') }}">
                <div class="menu__icon">
                    <div></div>
                </div>
            </a>
        </div>
        <h1>Rese</h1>
    </div>
    <div class="search__box">
        <form action="{{ route('shops.search') }}" method="post">
            @csrf
            <div select__box>
                <select name="area_id">
                    <option value="all">All area</option>
                    <option value="1">東京都</option>
                    <option value="2">大阪府</option>
                    <option value="3">福岡県</option>
                </select>
                <select name="genre_id">
                    <option value="all">All genre</option>
                    <option value="1">寿司</option>
                    <option value="2">焼肉</option>
                    <option value="3">居酒屋</option>
                    <option value="4">イタリアン</option>
                    <option value="5">ラーメン</option>
                </select>
            </div>
            <div class="search__input">
                <button type="submit">&#128269;</button>
                <input type="text" name="keyword" placeholder="Search..">
            </div>
        </form>
    </div>
</header>
@endsection

@section('main')
<div class="shop__list">
    @isset($shops)
    @foreach($shops as $shop)
    <div class="shop__card">
        <div class="shop__photo">
            <img src="{{ $shop->image }}" alt="{{ $shop->name }}">
        </div>
        <div class="shop__details">
            <h3 class="shop__name">{{ $shop->name }}</h3>
            <p class="shop__info">{{ $shop->area->area_name }} - {{ $shop->genre->genre_name }}</p>
            <div class="shop__buttons">
                <a href="{{ route('shop.detail', ['id' => $shop->id]) }}">詳しくみる</a>
                <form method="post" action="{{ route('favorite',['id' =>  $shop->id]) }}">
                    @csrf
                    <button type="submit" class="favorite__button @if(auth()->user() && auth()->user()->favorites && auth()->user()->favorites->contains($shop)) active @endif"></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>該当する店舗が見つかりませんでした。</p>
    @endisset
</div>
@endsection