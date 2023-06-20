<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:201',
            ]);
            
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->save();   
        //return 200
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first(); //category find id
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
        $user = DB::table('products')->where('id', $id)->update($data);
        //return 200;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('products')->where('id', $id)->delete();
        //return 200;
    }
}
