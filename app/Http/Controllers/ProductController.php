<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');

    $products = Product::when($search, function ($query, $search) {
        return $query->where('name', 'like', '%' . $search . '%');
    })->get();

    return view('products.index', compact('products', 'search'));
}

public function create()
{
    return view('products.create');
}



public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    \App\Models\Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $product = \App\Models\Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $product = \App\Models\Product::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

public function destroy($id)
{
    $product = \App\Models\Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
}


    
}
