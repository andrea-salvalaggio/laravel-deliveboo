<?php

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            [
                'name'=> 'tomato',
                'ingredientPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 1.50,
            ],
            [
                'name'=> 'mozzarella',
                'ingredientPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 7.00,
            ],
            [
                'name'=> 'chicken',
                'ingredientPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 6.00,
            ],
            [
                'name'=> 'beef',
                'ingredientPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 10,
            ],
            [
                'name'=> 'bread',
                'ingredientPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 1.50,
            ],
        ];

        foreach ($ingredients as $ingredient) {
            
            $newIngredient = new Ingredient();
            
            $newIngredient->name = $ingredient['name'];
            $newIngredient->ingredientPic = $ingredient['ingredientPic'];
            $newIngredient->price = $ingredient['price'];

            $newIngredient->save();
        }
    }
}
