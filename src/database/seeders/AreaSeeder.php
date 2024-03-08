<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;


class AreaSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            ['area_name' => '東京都'],
            ['area_name' => '大阪府'],
            ['area_name' => '福岡県'],
        ];
            Area::insert($areas);
    }
}
