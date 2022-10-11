<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'address', 'open', 'close', 'restaurantPic',
    ];

    public function user (){
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

}
