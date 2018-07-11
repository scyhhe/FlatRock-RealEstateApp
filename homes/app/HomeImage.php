<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
    public function homes()
    {
        return $this->belongsTo(Home::class);    
    }
}
