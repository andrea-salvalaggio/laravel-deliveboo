<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $orders = [
            [
                'restaurant_id'=> 1,
                'address'=> 'Via Manzoni 2',
                'name'=> 'Gino Pino',
                'surname'=> 'Rossi',
                'comment'=> 'suonare al campanello 2',
                'price'=> 40.00,
            ],
        ];

        foreach ($orders as $order) {
            
            $newOrder = new Order();

            $newOrder->restaurant_id = $order['restaurant_id'];
            $newOrder->address = $order['address'];
            $newOrder->name = $order['name'];
            $newOrder->surname = $order['surname'];
            $newOrder->comment = $order['comment'];
            $newOrder->price = $order['price'];

            $newOrder->save();
        }
    }
}
