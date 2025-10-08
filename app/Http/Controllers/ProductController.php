<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();

        return view('welcome', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products/store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            "name" => "required|string",
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category' => 'required|in:food,drink',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imageName = str_replace(' ', '_', $request->name) . '.' . $request->image->extension();
            $val['image'] = $request->file('image')->storeAs('products', $imageName, 'public');
        }

        Product::create($val);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $val = $request->validate([
            "name" => "required|string",
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category' => 'required|in:food,drink',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imageName = str_replace(' ', '_', $request->name) . '.' . $request->image->extension();
            $val['image'] = $request->file('image')->storeAs('products', $imageName, 'public');
        }

        $product->update($val);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
