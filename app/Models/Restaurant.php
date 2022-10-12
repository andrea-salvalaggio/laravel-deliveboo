<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'user_id', 'address', 'open', 'close', 'restaurantPic',
    ];

    public function user (){
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
