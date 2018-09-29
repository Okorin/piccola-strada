<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'product_size';
    public function products() 
    {
        return $this->belongsToMany('App\Product');
    }

    public function sizes()
    {
        return $this->belongsTo('App\Size');
    }
}
