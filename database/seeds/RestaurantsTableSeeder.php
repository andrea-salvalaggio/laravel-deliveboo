<?php

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $restaurants=[
            [
                'user_id' => 1,
                'name'=> 'McDonald\'s',
                'address'=> 'Via Giacomo Antonini, 28',
                'open'=> '07:00',
                'close'=>'02:00',
                'restaurantPic'=> 'https://s41230.pcdn.co/wp-content/uploads/2021/12/McDonalds-Net-Zero-restaurant-HEADER.jpg',

            ],

            [
                'user_id' => 2,
                'name'=> 'Domino\'s Pizza',
                'address'=> 'Via Guecello Tempesta, 57',
                'open'=> '06:00',
                'close'=>'23:00',
                'restaurantPic'=> 'https://www.bakingbusiness.com/ext/resources/2020/3/DominosRestaurant_Lead.jpg?t=1585667973&width=1080',

            ],

            [
                'user_id' => 3,
                'name'=> 'Qdoba',
                'address'=> 'via Aldo Manuzio, 28',
                'open'=> '10:30',
                'close'=>'23:00',
                'restaurantPic'=> 'https://cdn.vox-cdn.com/thumbor/zBEzySds-coOKCa7Ymm2H56gr6A=/0x0:3500x2336/1200x800/filters:focal(1470x888:2030x1448)/cdn.vox-cdn.com/uploads/chorus_image/image/58037473/L_Omaha-1-2.0.0.jpg',

            ],

            [
                'user_id' => 4,
                'name'=> 'Tim Hortons',
                'address'=> 'via Marmorata, 39',
                'open'=> '05:0',
                'close'=>'23:00',
                'restaurantPic'=> 'https://www.worldcoffeeportal.com/getattachment/acccf7e4-eeb8-4705-a9f0-0798660d3e0f/2111258_1600-Exterior-1-(1).jpg.aspx?lang=en-GB&width=700&height=466',

            ],

            [
                'user_id' => 5,
                'name'=> 'Maharajah indian',
                'address'=> 'Via della Stazione 34',
                'open'=> '11:30',
                'close'=>'23:59',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/17/80/37/65/our-restaurant.jpg',

            ],

            [
                'user_id' => 6,
                'name'=> 'La vecchia stalla',
                'address'=> 'Via della Quadro 34',
                'open'=> '11:30',
                'close'=>'23:59',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/0b/9b/a7/88/cremeria-la-vecchia-stalla.jpg',

            ],

            [
                'user_id' => 7,
                'name'=> 'Mikonos',
                'address'=> 'Via della Porrettana 154',
                'open'=> '11:30',
                'close'=>'23:59',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/0f/c7/da/9e/mykonos-interior.jpg',

            ],
        ];

        foreach ($restaurants as $restaurant) {

            $newRestaurant = new Restaurant();

            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->open = $restaurant['open'];
            $newRestaurant->close = $restaurant['close'];
            $newRestaurant->restaurantPic = $restaurant['restaurantPic'];

            $newRestaurant->save();
        };
    }
}
