<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sizes()
    {
        return $this->belongsToMany('App\Size')->withPivot('price');
    }

    public function size($id)
    {
        return $this->belongsToMany('App\Size')->withPivot('price')->where('id', '=', $id);
    }


    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->orderBy('priority', 'desc');
    }
    public function category()
    {
        return $this->belongsTo('App\Category'); 
    }
}
