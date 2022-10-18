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
            [
                'name' => 'pizzeria',
                'color' => '#8DCEFF'
            ],
            [
                'name' => 'fast food',
                'color' => '#E66947'
            ],
            [
                'name' => 'asian fusion',
                'color' => '#A1D543'
            ],
            [
                'name' => 'italian',
                'color' => '#6E6676'
            ],
            [
                'name' => 'bakery',
                'color' => '#F16BB2'
            ],
            [
                'name' => 'ice-cream shop',
                'color' => '#4465C0'
            ],
            [
                'name' => 'mexican',
                'color' => '#000000'
            ],
            [
                'name' => 'indian',
                'color' => '#8D2B00'
            ],
            [
                'name' => 'greek',
                'color' => '#71989B'
            ],
            [
                'name' => 'salads',
                'color' => '#527E4B'
            ],
            [
                'name' => 'spanish',
                'color' => '#EE3239'
            ],
            [
                'name' => 'japanese',
                'color' => '#9D6AB9'
            ],
            [
                'name' => 'chinese',
                'color' => '#FE8D6F'
            ],
        ];

        foreach ($categories as $category) {

            $newCategory = new Category();

            $newCategory->name = $category['name'];
            $newCategory->color = $category['color'];
            $newCategory->save();
        }
    }
}
