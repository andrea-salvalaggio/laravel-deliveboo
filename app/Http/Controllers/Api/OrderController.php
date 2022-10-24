<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        $sentData = $request->all();
        $orderInfo = $sentData['data'][1];
        $orderDishes = $sentData['data'][0];

        $newOrder = new Order();
        $newOrder->name = $orderInfo['name'];
        $newOrder->surname = $orderInfo['surname'];
        $newOrder->address = $orderInfo['address'];
        $newOrder->comment = $orderInfo['comment'];
        $newOrder->price = $orderInfo['total'];
        $newOrder->restaurant_id = $orderInfo['restaurant_id'];
        // $newOrder->dishes()->pivot->quantity = $orderInfo['quantity'];
        $newOrder->save();

        foreach ($orderDishes as $dish) {
            $newOrder->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        }

        return response()->json([
            'result' => true,
            'arriv' => $orderDishes
        ]);
    }
}
