<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('members')->insert([
            'full_name' => 'Trần Văn A',
            'gender' => '1',
            'birthday' => '2001-07-28',
            'phone' => '0704460748',
            'address' => '65 Võ Trứ',
            'image_path' => '/storage/imguser/imgdefault.png',
            'image_name' => 'imgdefault.png',
            'email' => 'a.tv@gmail.com',
            'email_verified_at' => $today,
            'password' => Hash::make('123'),
            'status' => '1',
            'token_verify' => null,
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('members')->insert([
            'full_name' => 'Hồ Quỳnh B',
            'gender' => '0',
            'birthday' => '2001-03-08',
            'phone' => '0708470644',
            'address' => '05 Nguyễn Hữu Huân',
            'image_path' => '/storage/imguser/imgdefault.png',
            'image_name' => 'imgdefault.png',
            'email' => 'b.hq@gmail.com',
            'password' => Hash::make('123'),
            'status' => '0',
            'token_verify' => null,
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
