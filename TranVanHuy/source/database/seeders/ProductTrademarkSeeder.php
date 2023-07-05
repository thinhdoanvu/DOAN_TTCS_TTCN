<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTrademarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('trademarks')->insert([
            'name' => 'Việt Nam',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Nam Phi',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'New Zealand',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Úc',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Thái Lan',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Hàn Quốc',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Pháp',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('trademarks')->insert([
            'name' => 'Mỹ',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
