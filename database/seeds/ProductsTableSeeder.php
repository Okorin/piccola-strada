<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 50)->create()->each(function ($product) {
            for ($i=1; $i<4; $i++) {
                App\Price::create(['product_id' => $product->id,
                                   'size_id' => $i,
                                   'price' => round(mt_rand() / mt_getrandmax() * rand(1, 3), 2)]);
            }
        });
    }
}
