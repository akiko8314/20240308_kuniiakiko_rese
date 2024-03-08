@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_list.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="icon__box">
        <a class="menu-icon">
            <div class="menu-line--top"></div>
            <div class="menu-line--middle"></div>
            <div class="menu-line--under"></div>
        </a>
    </div>
    <h1>Rese</h1>
    <div class="search__box">
        <form action="{{ route('shops.search') }}" method="post">
            @csrf
            <select name="area">
                <option value="all">All area</option>
                <option value="tokyo">東京</option>
                <option value="osaka">大阪</option>
                <option value="fukuoka">福岡</option>
            </select>
            <select name="genre">
                <option value="all">All genre</option>
                <option value="sushi">寿司</option>
                <option value="yakiniku">焼肉</option>
                <option value="italian">イタリアン</option>
                <option value="ramen">ラーメン</option>
                <option value="izakaya">居酒屋</option>
            </select>
            <div class="search__box">
                <button type="submit"><i class="search__icon"></i></button>
                <input type="text" name="keyword" placeholder="&#128269; Search">
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
            <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}">
        </div>
        <div class="shop__details">
            <h3 class="shop__name">{{ $shop->name }}</h3>
            <p class="shop__info">{{ $shop->area }} - {{ $shop->genre }}</p>
            <div class="shop__buttons">
                <a href="{{ route('shop.show', $shop->id) }}" class="detail__button">詳しくみる</a>
                <form method="post" action="{{ route('toggle-favorite', $shop->id) }}">
                    @csrf
                    <button type="submit" class="favorite__button @if(auth()->user()->favorites->contains($shop)) active @endif"></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endisset
</div>
@endsection