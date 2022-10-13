<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable =[
        'name', 'visible', 'price', 'description', 'dishPic'
    ];

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }

    public function ingredients(){
        return $this->belongsToMany('App\Models\Ingredient');
    }

    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }
}
