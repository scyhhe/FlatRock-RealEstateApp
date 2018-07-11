<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public function images()
    {
        return $this->hasMany(HomeImage::class);    
    }

    public function broker()
    {
        return $this->belongsTo(User::class);
    }

    // public function formatPrice($price)
    // {
    //     return money_format('%.3n', $price); 
    // }
}
