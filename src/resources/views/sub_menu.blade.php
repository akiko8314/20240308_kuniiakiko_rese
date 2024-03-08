@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sub_menu.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="close__icon">
        <span class="close-icon">&#10005;</span>
    </div>
</header>
@endsection

@section('main')

<div class="menu__box">
    <div class="menu-item">
        <a href="{{ route('shops') }}" class="menu-text">Home</a>
    </div>
    <div class="menu-item">
        <a href="{{ route('register') }}" class="menu-text">Registration</a>
    </div>
    <div class="menu-item">
        <a href="{{ route('login') }}" class="menu-text">Login</a>
    </div>
</div>

@endsection