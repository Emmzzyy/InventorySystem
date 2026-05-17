<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
{
    $categories = Category::all();
    $suppliers = Supplier::all();

    return view('products.create',
        compact('categories', 'suppliers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    //to edit method
    public function edit(Product $product)
{
    $categories = Category::all();
    $suppliers = Supplier::all();
    return view('products.edit', compact('product', 'categories', 'suppliers'));
}
//to update method
public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'sku' => 'required|unique:products,sku,' . $product->id,
        'unit_price' => 'required|numeric',
        'quantity' => 'required|integer',
        'image' => 'nullable|image'
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully');
}
//to delete method
public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully');
}

}