<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'surname', 'address', 'comment', 'price'
    ];

    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function dishes(){
        return $this->belongsToMany('App\Models\Dish');
    }
}
