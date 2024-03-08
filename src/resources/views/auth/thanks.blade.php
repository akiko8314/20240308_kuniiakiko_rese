@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="icon__box">
        <a href="{{ route('sub_menu') }}">
            <div class="menu__icon">
                <div></div>
            </div>
        </a>
    </div>
    <h1>Rese</h1>
</header>
@endsection

@section('main')

<div class="massage__box">
    <h2>会員登録ありがとうございます</h2>
</div>
<div class="button__box">
    <a href="">ログインする</a>
</div>

@endsection