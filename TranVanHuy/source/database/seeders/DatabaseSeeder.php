<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // User
            UserSeeder::class,
            // Member
            MemberSeeder::class,
            // Menu
            MenuSeeder::class,
            MenuLocationSeeder::class, // MenuLocation
            MenuNoteSeeder::class, // Menunote
            // Slider
            SliderSeeder::class,
            // Post
            PostSeeder::class,
            Post_categorySeeder::class, // Post_Category
            Post_PostcategorySeeder::class, // Post_Postcategory
            // Comment
            // Product
            ProductSeeder::class,
            ProductCategorySeeder::class, // Category
            ProductSupplierSeeder::class, // Supply
            ProductTrademarkSeeder::class, // Trademark
            ProductUnitSeeder::class, // Unit
            // Promotion

            // Slug
            SlugSeeder::class,
        ]);
    }
}
