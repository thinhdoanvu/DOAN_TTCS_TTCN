<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Post_PostcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_postcategory')->insert([
            'post_id' => '1',
            'postcategory_id' => '1',
        ]);

        DB::table('post_postcategory')->insert([
            'post_id' => '2',
            'postcategory_id' => '1',
        ]);

        DB::table('post_postcategory')->insert([
            'post_id' => '2',
            'postcategory_id' => '2',
        ]);
    }
}
