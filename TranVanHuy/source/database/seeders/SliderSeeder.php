<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('sliders')->insert([
            'name' => 'Sản phẩm cửa hàng',
            'description' => 'Tươi sạch',
            'image_path' => '/storage/sliders/YUoujx2KmOX8sJJ4vaA3.png',
            'image_name' => 'Slider1',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('sliders')->insert([
            'name' => 'Quá tết TRÁI CÂY SUM VẦY đón tết',
            'image_path' => '/storage/sliders/dbRB9BD5GbwA5uRzvJ8t.png',
            'image_name' => 'Slider2',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('sliders')->insert([
            'name' => 'Năm mới LẠC QUAN MAY MẮN ngập tràn',
            'image_path' => '/storage/sliders/zzbEJdOgvKGdIA0iJvLi.png',
            'image_name' => 'Slider3',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
