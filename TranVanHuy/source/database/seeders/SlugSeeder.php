<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        DB::table('slugs')->insert([
            'nameSlug' => 'su-kien',
            'slugable_id' => '1',
            'slugable_type' => 'App\Models\Post',
            'created_at' => $today,
            'updated_at' => $today,
        ]);

        DB::table('slugs')->insert([
            'nameSlug' => 'tin-tuc-su-kien',
            'slugable_id' => '2',
            'slugable_type' => 'App\Models\Post',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'buoi-da-xanh',
            'slugable_id' => '1',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'buoi-nam-roi',
            'slugable_id' => '2',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'cam-sanh',
            'slugable_id' => '3',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'cam-xoan',
            'slugable_id' => '4',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'cam-my',
            'slugable_id' => '5',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'chom-chom-thai',
            'slugable_id' => '6',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'chom-chom-nhan',
            'slugable_id' => '7',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'le-duong',
            'slugable_id' => '8',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'le-nam-phi',
            'slugable_id' => '9',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'le-han',
            'slugable_id' => '10',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'mit-thai',
            'slugable_id' => '11',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'tao-gio',
            'slugable_id' => '12',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'tao-new-zealand',
            'slugable_id' => '13',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'tao-phap',
            'slugable_id' => '14',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'xoai-cat-hoai-loc',
            'slugable_id' => '15',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'xoai-thai',
            'slugable_id' => '16',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
        DB::table('slugs')->insert([
            'nameSlug' => 'xoai-uc',
            'slugable_id' => '17',
            'slugable_type' => 'App\Models\Product',
            'created_at' => $today,
            'updated_at' => $today,
        ]);
    }
}
