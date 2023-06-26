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
    public function index()
    {
        $products = Product::all();
        return response()->json($products); //товар через категории
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:201',
            'category' => 'required|exists:categories,id'
            ]);
            
        $product = new Product;
        $product->product_name = $request->product_name;
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
        $data['product_name'] = $request->product_name;
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
