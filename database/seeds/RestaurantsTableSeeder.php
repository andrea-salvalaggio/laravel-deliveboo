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
                'open'=> '05:00',
                'close'=>'02:00',
                'restaurantPic'=> 'https://www.worldcoffeeportal.com/getattachment/acccf7e4-eeb8-4705-a9f0-0798660d3e0f/2111258_1600-Exterior-1-(1).jpg.aspx?lang=en-GB&width=700&height=466',

            ],

            [
                'user_id' => 5,
                'name'=> 'KFC',
                'address'=> 'Piazza Orazio Giustiniani, 2',
                'open'=> '09:00',
                'close'=>'22:00',
                'restaurantPic'=> 'https://www.nrn.com/sites/nrn.com/files/styles/article_featured_retina/public/KFC%20Westfield-456.jpg?itok=uuJK6bUv',

            ],

            [
                'user_id' => 6,
                'name'=> 'Burger King',
                'address'=> 'via Giovanni Branca, 88',
                'open'=> '06:30',
                'close'=>'02:00',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/0b/9b/a7/88/cremeria-la-vecchia-stalla.jpg',

            ],

            [
                'user_id' => 7,
                'name'=> 'Olive Garden',
                'address'=> 'Via Galvani, 24',
                'open'=> '10:30',
                'close'=>'22:00',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/0f/c7/da/9e/mykonos-interior.jpg',

            ],

            [
                'user_id' => 8,
                'name'=> 'Taco Bell',
                'address'=> 'Via Nicola Zabaglia, 25',
                'open'=> '08:30',
                'close'=>'23:30',
                'restaurantPic'=> 'https://www.nrn.com/sites/nrn.com/files/styles/article_featured_retina/public/taco-bell_b_5.gif?itok=w_gOdowi',

            ],

            [
                'user_id' => 9,
                'name'=> 'Paciugo Gelato Caffè',
                'address'=> 'Via Alessandro Volta, 8',
                'open'=> '10:00',
                'close'=>'22:00',
                'restaurantPic'=> 'https://www.restaurantnews.com/wp-content/uploads/2018/08/Paciugo-Gelato-Caffe-Acquired-by-Dallas-based-Sinelli-Concepts-International-1024x683.jpg',

            ],

            [
                'user_id' => 10,
                'name'=> 'Pancheros',
                'address'=> 'Piazza S Maria Liberatrice, 44',
                'open'=> '09:30',
                'close'=>'23:00',
                'restaurantPic'=> 'https://www.restaurantnews.com/wp-content/uploads/2018/08/Paciugo-Gelato-Caffe-Acquired-by-Dallas-based-Sinelli-Concepts-International-1024x683.jpg',

            ],

            [
                'user_id' => 11,
                'name'=> 'Pizza Hut',
                'address'=> 'Lungotevere Testaccio, 7',
                'open'=> '06:30',
                'close'=>'02:00',
                'restaurantPic'=> 'https://securecdn.pymnts.com/wp-content/uploads/2021/01/shutterstock_1150633349-1-768x461.jpg',

            ],

            [
                'user_id' => 12,
                'name'=> 'Subway',
                'address'=> 'Via Beniamino Franklin, 12',
                'open'=> '07:00',
                'close'=>'01:00',
                'restaurantPic'=> 'https://lh4.googleusercontent.com/wpL70zui6NIxhfQ77P-bk05JicebmHptF6_Dixze8JdJRx6QBiZeM3PZN7WH5Cq7xjjOLzCKNA1fW86uqbviT9nABUSo5hnQ3hp5ylsI6ITl9NXnIBXMwtnIbNNchjQa85wmMKrm',

            ],

            [
                'user_id' => 13,
                'name'=> 'Wendy\'s',
                'address'=> 'Via Cesare Battisti, 23',
                'open'=> '06:30',
                'close'=>'22:30',
                'restaurantPic'=> 'https://www.nrn.com/sites/nrn.com/files/styles/article_featured_retina/public/wendys%20tech%20investments.jpg?itok=bH24LEE5',

            ],

            [
                'user_id' => 14,
                'name'=> 'Mr.Greek',
                'address'=> 'Via Michelangelo, 69',
                'open'=> '09:00',
                'close'=>'22:00',
                'restaurantPic'=> 'https://nationalfranchisedirectory.com/photos/main/308-0-nowopenfront-no-vinyl-3.jpg',

            ],

            [
                'user_id' => 15,
                'name'=> 'Shiv Sagar',
                'address'=> 'Via Leonardo Da Vinci, 76',
                'open'=> '10:30',
                'close'=>'23:00',
                'restaurantPic'=> 'https://cdn.dnaindia.com/sites/default/files/styles/full/public/2016/06/15/472010-shiv-sagar.jpg',

            ],

            [
                'user_id' => 16,
                'name'=> 'Congee Queen',
                'address'=> 'Via Roma, 56',
                'open'=> '10:30',
                'close'=>'23:00',
                'restaurantPic'=> 'https://ssmscdn.yp.ca/image/resize/82168109-f403-4dbb-acea-7dadae105ebd/ypui-d-mp-pic-gal-lg/congee-queen-storefront-1.jpg',

            ],

            [
                'user_id' => 17,
                'name'=> 'La Andaluza',
                'address'=> 'Vicolo Cavour, 42',
                'open'=> '11:30',
                'close'=>'21:30',
                'restaurantPic'=> 'https://www.laandaluza.com/wp-content/uploads/toledo_1-2000x1200.jpg',

            ],

            [
                'user_id' => 18,
                'name'=> 'Pret a Manger',
                'address'=> 'Viale Luzzati, 88',
                'open'=> '07:30',
                'close'=>'21:00',
                'restaurantPic'=>'https://ichef.bbci.co.uk/news/976/cpsprodpb/EAB0/production/_119908006_pret.jpg',

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
