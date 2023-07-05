<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('suppliers')->insert([
            'name' => 'Chợ Bình Tân',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Chợ Đầm',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Chợ Phước Hải',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Chợ Vĩnh Hải',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Chợ Xóm Mới',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
