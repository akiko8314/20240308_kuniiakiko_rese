<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(GenreSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(ShopSeeder::class);

    }
}
