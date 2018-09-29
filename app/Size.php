<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('price');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

}
