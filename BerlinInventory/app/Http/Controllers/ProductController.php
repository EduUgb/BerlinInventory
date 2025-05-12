<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $products = Products::all(); // Obtiene todos los productos
    return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Products $product)
    {
        $validated = $request->validate([
            'prod_name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'min_stock' => 'required|integer'
        ]);
 
        $product->create([
            "prod_name"  => $request->prod_name,
            "stock" => $request->stock,
            "price"  => $request->price,
            "min_stock" => $request->min_stock,

        ]);{
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }}

        public function create(Products $product)
    {
        return view('products.create', compact('product'));
    }


    public function show(string $id)
    {
        $product = Products::findOrFail($id); // Encuentra el producto por ID
        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product )
    {

        $validated = $request->validate([
            'prod_name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'min_stock' => 'required|integer'
        ]);
 
        $product->update([
            "prod_name"  => $request->prod_name,
            "stock" => $request->stock,
            "price"  => $request->price,
            "min_stock" => $request->min_stock,

        ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

        public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Products $product)
    {
        $product ->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
