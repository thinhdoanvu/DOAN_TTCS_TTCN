<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('menunotes')->insert([
            'name' => 'Trang chủ',
            'parent_id' => '0',
            'slug' => 'home',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
        DB::table('menunotes')->insert([
            'name' => 'Thông tin',
            'parent_id' => '0',
            'slug' => 'home',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
        DB::table('menunotes')->insert([
            'name' => 'Bài viết',
            'parent_id' => '0',
            'slug' => 'blog.blogIndex',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
        DB::table('menunotes')->insert([
            'name' => 'Liên hệ',
            'parent_id' => '0',
            'slug' => 'home',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
        DB::table('menunotes')->insert([
            'name' => 'Sản phẩm',
            'parent_id' => '2',
            'slug' => 'home',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
        DB::table('menunotes')->insert([
            'name' => 'Giỏ hàng',
            'parent_id' => '2',
            'slug' => 'cart.detail',
            'created_at' => $today,
            'updated_at' => $today,
            'menu_id' => '1',
        ]);
    }
}
