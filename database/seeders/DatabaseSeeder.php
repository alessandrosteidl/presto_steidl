<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Calzature',
        'Prodotti per la casa',
        'Bellezza e cura personale',
        'Sport e tempo libero',
        'Giocattoli e giochi',
        'Alimentari e bevande',
        'Salute e benessere',
        'Tecnologia e gadget'
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
