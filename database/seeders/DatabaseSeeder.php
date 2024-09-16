<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'Electronics',
        'Clothing',
        'Furniture',
        'Beauty and Cosmetics',
        'Food and Beverages',
        'Sports and Outdoors',
        'Toys and Kids',
        'Home and Kitchen',
        'Health and Wellness',
        'Automotive'
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->categories as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
