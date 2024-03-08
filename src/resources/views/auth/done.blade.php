@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
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
    <h2>ご予約ありがとうございます</h2>
</div>
<div class="button__box">
    <a href="">戻る</a>
</div>

@endsection