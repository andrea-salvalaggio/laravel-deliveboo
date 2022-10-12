<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[
            'pizzeria', 'fast food', 'asian fusion', 'italian', 'bakery', 'ice-cream shop', 'mexican', 'indian', 'greek', 'salads',
            'spanish', 'japanese', 'chinese'
        ];

        foreach ($categories as $category) {

            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
