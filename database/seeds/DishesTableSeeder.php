<?php

use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dishes = [
            [
                'restaurant_id'=> 1,
                'name'=> 'big mac',
                'description'=> 'One of the most iconic hamburger of the history, you can find it all around the world!',
                'dishPic'=> 'https://e7.pngegg.com/pngimages/611/768/png-clipart-mcdonald-s-big-mac-mcdonald-s-chicken-mcnuggets-hamburger-mcdonald-s-quarter-pounder-fast-food-salt.png',
                'price'=> 4.53,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'big potatoes',
                'description'=> 'The perfect side of every meal!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 1.52,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'pizza margherita',
                'description'=> 'The best pizza you can find!',
                'dishPic'=> 'https://www.antoniopulcini.it/wp-content/uploads/2020/06/pizza-margherita-dica-alimentare-3.png',
                'price'=> 4.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'cuoppo',
                'description'=> 'Fried everything is better!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 3.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 3,
                'name'=> 'bucket of tenders',
                'description'=> 'Fried everything is better!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 5.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 3,
                'name'=> 'big potatoes',
                'description'=> 'The perfect side of every meal!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 2.00,
                'visible'=> 1,
            ],
        ];

        foreach ($dishes as $dish) {
        
            $newDish = new Dish();

            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->dishPic = $dish['dishPic'];
            $newDish->price = $dish['price'];
            $newDish->visible = $dish['visible'];

            $newDish->save();
        }
    }
}
