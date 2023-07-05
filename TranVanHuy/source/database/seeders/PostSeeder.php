<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('posts')->insert([
            'title' => 'Sự kiện',
            'imagePath' => '/storage/posts/jj02iKTqTX7HuzbXeot5.jpg',
            'imageName' => 'bg_1.jpg',
            'posterName' => 'Admin',
            'content' => '<p>Ngon, bổ, rẻ</p>
                <p><img src="http://localhost:8000/storage/photos/1/bg_1.jpg" alt="" width="200" height="133"/></p>',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('posts')->insert([
            'title' => 'Tin tức, sự kiện',
            'imagePath' => '/storage/posts/tkXEIKcmwXkcyxgBFp1i.jpg',
            'imageName' => 'traicaynhapkhau.jpg',
            'posterName' => '22 MKT Nguyễn Đức An',
            'content' => '<p>Tin tức, sự kiện</p>
                <p><img src="http://localhost:8000/storage/photos/1/chanh-day.jpg" alt="" width="100" height="100" /></p>',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
