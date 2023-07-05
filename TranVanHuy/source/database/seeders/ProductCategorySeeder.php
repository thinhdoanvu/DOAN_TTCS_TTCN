<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('product_categories')->insert([
            'name' => 'Bưởi',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Cam',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Chôm chôm',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Lê',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Mít',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Táo',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Xoài',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
