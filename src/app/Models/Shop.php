<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function scopeByArea($query, $area)
    {
        return $query->where('area_id', $area);
    }

    public function scopeByGenre($query, $genre)
    {
        return $query->where('genre_id', $genre);
    }
}
