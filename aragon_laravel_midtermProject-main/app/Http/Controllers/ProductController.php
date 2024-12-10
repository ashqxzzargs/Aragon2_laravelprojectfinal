<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function store_product(Request $request) {
        $validated = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
        ]);
        Product::create($validated);
        return redirect()->route('dashboard')->with('success', 'Added product successfully');
    }

    public function edit_product_form($productId) {
        $product = Product::find($productId);
        return view('edit-product', compact('product'));
    }

    public function edit_product(Request $request, Product $productId) {
        $validated = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
        ]);

           $productId->update($validated);
            return redirect()->route('dashboard')->with('success', 'Product updated successfully!');
    }
    public function destroy_product(Product $productId) {
        $productId->delete();
        return  redirect()->route('dashboard')->with('success', 'Product deleted successfully!');
    }
}
