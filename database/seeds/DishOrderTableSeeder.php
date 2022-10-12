<?php

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
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
            // $dishes = $order->restaurant;
            $randomDishes=[];
            foreach($dishes as $dish) {
                if ($dish->restaurant_id == $order->restaurant_id) {
                    $randomDishes[] = $dish;
                }
            }

            // $randomDishes=[];
            // for ($i=0; $i < rand(1,4); $i++) { 
            //     $randomDishes[$i] = $dishes[0];
            // }
            
            foreach ($randomDishes as $dish) {
                $order->dishes()->attach($dish, ['quantity'=>rand(1,3)]);
            }
        }
    }
}
