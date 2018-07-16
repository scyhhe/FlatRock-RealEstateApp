<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(HomeImage::class);    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getlocation()
    {
        return $this->city . ', ' . $this->country;
    }

    public function getPricePerSquareMeter()
    {
        $size = $this->size ?? 100;
        return round(($this->price / $size));    
    }

}
