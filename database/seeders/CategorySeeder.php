<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Handcrafted Artisans', 'photo_src' => 'storage/categories/handcrafted_artisans.jpg'],
            ['name' => 'Local Produce', 'photo_src' => 'storage/categories/local_produce.jpg'],
            ['name' => 'Cultural Artifacts', 'photo_src' => 'storage/categories/cultural_artifacts.jpg'],
            ['name' => 'Food and Beverages', 'photo_src' => 'storage/categories/food_and_beverages.jpg'],
            ['name' => 'Outdoor and Adventure', 'photo_src' => 'storage/categories/outdoor_and_adventure.jpg'],
            ['name' => 'Health and Wellness', 'photo_src' => 'storage/categories/health_and_wellness.jpg'],
            ['name' => 'Home and Décor', 'photo_src' => 'storage/categories/home_and_decor.jpg'],
            ['name' => 'Tourism Services', 'photo_src' => 'storage/categories/tourism_services.jpg'],
            ['name' => 'Beauty and Personal Care', 'photo_src' => 'storage/categories/beauty_and_personal_care.jpg'],
            ['name' => 'Agriculture and Farming', 'photo_src' => 'storage/categories/agriculture_and_farming.jpg'],
            ['name' => 'Media and Communications', 'photo_src' => 'storage/categories/media_and_communications.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
