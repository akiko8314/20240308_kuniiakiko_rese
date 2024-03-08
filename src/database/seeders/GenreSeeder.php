<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['genre_name' => '寿司'],
            ['genre_name' => '焼肉'],
            ['genre_name' => '居酒屋'],
            ['genre_name' => 'イタリアン'],
            ['genre_name' => 'ラーメン'],
        ];

        Genre::insert($genres);
    }
}
