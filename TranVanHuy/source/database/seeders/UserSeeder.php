<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();
        
        DB::table('users')->insert([
            'name' => 'Trần Văn Huy',
            'email' => 'vanhuy12c6@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
