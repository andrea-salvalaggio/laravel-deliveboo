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
                'dishPic'=> 'https://images.dissapore.com/wp-content/uploads/2022/08/big-mac-chicken.jpg',
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

            [
                'restaurant_id'=> 4,
                'name'=> 'gyoza',
                'description'=> 'Gyoza are traditional Chinese dumplings that are extremely popular in East Asian countries, with their origins in China. They are also known as Jiaozi and are an essential part of traditional Chinese New Year celebrations.',
                'dishPic'=> 'https://media-assets.lacucinaitaliana.it/photos/61fd2d235455c3ec4f002f7c/4:3/w_800,h_600,c_limit/Gyoza-alla-piastra.jpg',
                'price'=> 4.00,
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
