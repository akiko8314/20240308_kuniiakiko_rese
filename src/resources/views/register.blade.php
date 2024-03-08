@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('link')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

<div class="register__box">
    <h2 class="register__form-tittle">Registration</h2>
    <div class="register__form">
        <form class="register__form-content" action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" required />
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="input-icon">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="input-icon">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="pass" placeholder="Password" required />
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="register__button">
                <button class="register__button--submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection