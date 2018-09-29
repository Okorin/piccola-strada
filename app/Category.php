<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() 
    {
        return $this->hasMany(Product::class);
    }

    public function scopeProductSizes($query)
    {
        return $query->join('category_size', 'category_size.category_id', '=', 'categories.id')
                     ->join('sizes', 'sizes.id', '=', 'category_size.size_id')
                     ->join('product_size', 'sizes.id', '=', 'product_size.size_id')
                     ->join('products', 'products.id', '=', 'product_size.product_id')
                     ->select('sizes.id as size_id', 'products.id as product_id', 'products.name', 'product_size.price');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
