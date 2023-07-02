<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $products = Product::where('categories_id', $id);
        return response()->json($products); //товар через категории
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:products|max:201',
            'categories_id' => 'required|exists:categories,id',
            'description'=> 'required',
            'price' => 'required'
            ]);
            
        $product = new Product;
        $product->name = $request->name;
        $product->categories_id = $request->categories_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();   
        return 201;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id); //category find id
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = array();
        $data['name'] = $request->name;
        $user = Product::find($id)->update($data);
        return 200;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::find($id)->delete();
        return 200;
    }
}
