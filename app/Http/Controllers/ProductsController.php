<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ingredient;
use App\Category;
use App\Product;
use App\Size;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        foreach($categories as $category) 
        {
            $products[$category->id] = Product::where('category_id', $category->id)->get();
        }
        return view('product.all')->with(['products' => $products,
                                          'categories' => $categories,
                                          'active' => 'card']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $ingredients = Ingredient::all();
        return view('product.create')->with(['categories' => $categories,
                                             'sizes' => $sizes,
                                             'ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('productName');
        $product->category_id = $request->input('category');
        $size = $request->input('size');
        $ingredient = $request->input('ingredient');
        DB::transaction(function() use ($product, $size, $ingredient) {
            $product->save();
            $prod = Product::find($product->id);
            foreach($size as $key => $siz) {
                if (!is_null($siz)) {
                    Size::findOrFail($key);
                    $prod->sizes()->attach($key, ['price' => $siz]);
                }
            }
            $ingred_ids = [];
            if(isset($ingredient)) {
                foreach($ingredient as $key => $ingr) {
                    if ($ingr === 'on') {
                        Ingredient::findOrFail($key);
                        $ingred_ids[] = $key;
                    }
                }
            }
            if (!empty($ingred_ids)) $prod->ingredients()->attach($ingred_ids);
        });
        return redirect('/products#product-' . $product->id . '-ref');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show')->with(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with(['product' => $product,
                                           'sizes' => Size::all(),
                                           'categories' => Category::all(),
                                           'ingredients' => Ingredient::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('productName');
        $product->category_id = $request->input('category');
        $size = $request->input('size');
        $ingredient = $request->input('ingredient');
        DB::transaction(function() use ($product, $size, $ingredient) {
            $product->save();
            $size_ids = [];
            $prod = Product::find($product->id);
            foreach($size as $key => $siz) {
                if (!is_null($siz)) {
                    Size::findOrFail($key);
                    $size_ids[$key] = ['price' => $siz];
                }
            }
            $prod->sizes()->sync($size_ids);
            $ingred_ids = [];
            if(isset($ingredient)) {
                foreach($ingredient as $key => $ingr) {
                    if ($ingr === 'on') {
                        Ingredient::findOrFail($key);
                        $ingred_ids[] = $key;
                    }
                }
            }
            $prod->ingredients()->sync($ingred_ids);
        });
        return redirect('/products#product-' . $product->id . '-ref');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
