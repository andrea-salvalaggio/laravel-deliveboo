<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable =[
        'name', 'price', 'ingredientPic',
    ];

    public function dishes(){
        return $this->belongsToMany('App\Models\Dish');
    }
}
