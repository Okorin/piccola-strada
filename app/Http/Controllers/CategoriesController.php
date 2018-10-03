<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Size;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.all')->with(['categories' => Category::orderBy('priority')->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create')->with(['sizes' => Size::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|max:255',
                                    'description' => 'nullable|max:255',
                                    'ingred_word' => 'nullable|max:255',
                                    'priority' => 'nullable|integer']);
        $category = new Category;
        $category->name = $data["name"];
        $category->description = $data["description"];
        $category->ingred_word = $data["ingred_word"];
        if ($data["priority"] !== null)
        $category->priority = $data["priority"];
        $size = $request->input('size');
        DB::transaction(function() use ($category, $size) {
            $category->save();
            $cat = Category::find($category->id);
            $size_ids = [];
            if(isset($size)) {
                foreach($size as $key => $siz) {
                    if ($siz === 'on') {
                        Size::findOrFail($key);
                        $size_ids[] = $key;
                    }
                }
            }
            if (!empty($size_ids)) $cat->sizes()->attach($size_ids);
        });
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with(['category' => $category,
                                            'sizes' => Size::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['name' => 'required|max:255',
                                    'description' => 'nullable|max:255',
                                    'ingred_word' => 'nullable|max:255',
                                    'priority' => 'integer|nullable']);
        $category->name = $data["name"];
        $category->description = $data["description"];
        $category->ingred_word = $data["ingred_word"];
        if ($data["priority"] !== null)
            $category->priority = $data["priority"];
        $size = $request->input('size');
        DB::transaction(function() use ($category, $size) {
            $category->save();
            $cat = Category::find($category->id);
            $size_ids = [];
            if(isset($size)) {
                foreach($size as $key => $siz) {
                    if ($siz === 'on') {
                        Size::findOrFail($key);
                        $size_ids[] = $key;
                    }
                }
            }
            if (!empty($size_ids)) $cat->sizes()->sync($size_ids);
        });
        return redirect('/categories');
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
