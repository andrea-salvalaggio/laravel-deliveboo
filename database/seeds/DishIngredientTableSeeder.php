<?php

use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class DishIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dishes=Dish::all();
        $ingredients=Ingredient::all();

        //! attacchiamo a il piatto 0 l'ingrendiente 0,3,4 eseguendo 3 attach diversi

        $dishes[0]->ingredients()->attach($ingredients[3]);
        $dishes[0]->ingredients()->attach($ingredients[4]);
        $dishes[0]->ingredients()->attach($ingredients[0]);
    
        $dishes[1]->ingredients()->attach($ingredients[5]);

        //! attacchiamo a il piatto 2 l'ingrendiente 0,1 eseguendo 2 attach diversi
        $dishes[2]->ingredients()->attach($ingredients[0]);
        $dishes[2]->ingredients()->attach($ingredients[1]);

        $dishes[3]->ingredients()->attach($ingredients[5]);
        $dishes[4]->ingredients()->attach($ingredients[2]);
        $dishes[5]->ingredients()->attach($ingredients[5]);
    }
}
