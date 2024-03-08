@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main_menu.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="close__icon">
        <a class="close-icon">&#10005;</a>
    </div>
</header>
@endsection

@section('main')

<div class="menu__box">
    <div class="menu-item">
        <a href="{{ route('shops') }}" class="menu-text">Home</a>
    </div>
    <div class="menu__item--logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="menu-text">Logout</button>
        </form>
    </div>
    <div class="menu__item--Mypage">
        <a href="{{ route('my_page.index') }}" class="menu-text">Mypage</a>
    </div>
</div>

@endsection