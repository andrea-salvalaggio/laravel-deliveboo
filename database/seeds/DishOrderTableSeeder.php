<?php

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $dishes = Dish::all();

        foreach ($orders as $order) {
            $randomDishes = Dish::inRandomOrder()->limit(rand(1, 3))->get();
            
            foreach ($randomDishes as $dish) {
                $order->dishes()->attach($dish, ['quantity'=>rand(1,3)]);
            }
        }
    }
}
