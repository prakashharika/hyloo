<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'vendor'])->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
            'vendors' => Vendor::all(),
        ]);
    }

    public function store(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required',
            'category_id' => 'nullable',
            'vendor_id' => 'nullable',
            'base_price' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]));

        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'vendors' => Vendor::all(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Deleted');
    }
}

