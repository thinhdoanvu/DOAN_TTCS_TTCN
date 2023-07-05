<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Post_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('post_categories')->insert([
            'name' => 'Events',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('post_categories')->insert([
            'name' => 'News',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
