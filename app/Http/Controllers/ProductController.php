<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $products = Product::with('supplier')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create(): \Illuminate\View\View
    {
        $products = Product::pluck('name');
        $suppliers = Supplier::pluck('name');

        return view('products.create', compact('products', 'suppliers'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'product' => 'required|min:3|max:255|string',
            'supplier' => 'required|min:3|max:255|string',
            'price' => 'required|min:0|numeric',
            'description' => 'required|min:3|max:255|string',
        ]);
        $supplier = Supplier::firstOrCreate([
            'name' => $validate['supplier']
        ]);
        Product::create([
            'name' => $validate['product'],
            'supplier_id' => $supplier->id,
            'price' => $validate['price'],
            'description' => $validate['description'],
        ]);

        return redirect('/products');
    }
    
    public function show(Product $product): \Illuminate\View\View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): \Illuminate\View\View
    {
        $products = Product::pluck('name');
        $suppliers = Supplier::pluck('name');

        return view('products.edit', compact('product', 'products', 'suppliers'));
    }

    public function update(Product $product, Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'product' => 'required|min:3|max:255|string',
            'supplier' => 'required|min:3|max:255|string',
            'price' => 'required|min:0|numeric',
            'description' => 'required|min:3|max:255|string',
        ]);

        $supplier = Supplier::firstOrCreate(['name' => $validatedData['supplier']]);


        $product->update([
            'name' => $validatedData['product'],
            'supplier_id' => $supplier->id,
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        return redirect('/products/' . $product->id);
    }

    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return redirect('/products');
    }
}
