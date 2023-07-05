<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('units')->insert([
            'type' => 'Kg',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('units')->insert([
            'type' => 'Trái',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('units')->insert([
            'type' => 'Hộp',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('units')->insert([
            'type' => 'Giỏ',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
