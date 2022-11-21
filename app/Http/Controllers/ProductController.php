<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductResource::collection(Product::with('category')->get());
        return Inertia::render('Product/Index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Product/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'category_id' => ['required'],
            'image' => ['required', 'image'],
            'price' => ['required'],
            'description' => ['required'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('products');
            $trending = $request == TRUE ? '0' : '1';
            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image' => $image,
                'price' => $request->price,
                'description' => $request->description,
                'trending' => $trending
            ]);
            return Redirect::route('products.index')->with('message', 'Product created successfully.');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return Inertia::render('Product/Edit', compact('product', 'categories'));
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
        $image = $product->image;
        $request->validate([
            'name' => ['required', 'min:3'],
            'category_id' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
        ]);

        if($request->hasFile('image')){
            Storage::delete('image');
            $image = $request->file('image')->store('products');
            $trending = $request == TRUE ? '0' : '1';

            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image' => $image,
                'price' => $request->price,
                'description' => $request->description,
                'trending' => $trending
            ]);
            return Redirect::route('products.index')->with('message', 'Product update successfully.');
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return Redirect::back()->with('message', 'Product deleted successfully.');

    }
}
