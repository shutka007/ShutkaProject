<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryes = Category::all();
        return view('categoryes.index', compact('categoryes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {   
        return view('categoryes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);   
        Category::create($request->all());
        return redirect()->route('categoryes.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('categoryes.show', with('category', $category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('categoryes.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        $category->delete();

       return redirect()->route('categoryes.index')
                       ->with('success','category deleted successfully');
    }
}
