@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
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
<div class="main__container">
    <div class="shop__details--container">
        <div class="shop__info">
            <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}">
            <div>
                <p>{{ $shop->area->area_name }} - {{ $shop->genre->genre_name }}</p>
                <p>{{ $shop->overview }}</p>
            </div>
        </div>
    </div>
    <div class="reservation__box">
        <div class="reservation__form">
            <h2 class="reservation__tittle">予約</h2>
            <form action="{{ route('reservation.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="party_size">Party size:</label>
                    <input type="number" id="party_size" name="party_size" required min="1">
                </div>

                <div class="reserve__button">
                    <button type="submit">予約する</button>
                </div>
            </form>
        </div>

        <div class="reservation__detail">
            @foreach($reservations as $reservation)
            <div class="reservation__item">
                <p><strong>Date:</strong> {{ $reservation->date }}</p>
                <p><strong>Time:</strong> {{ $reservation->time }}</p>
                <p><strong>PartySize:</strong> {{ $reservation->party_size }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection