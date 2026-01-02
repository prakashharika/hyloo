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
    $data = $request->validate([
        'name' => 'required|string|max:200',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,category_id',
        'vendor_id' => 'nullable|exists:vendors,id',
        'base_price' => 'nullable|numeric',
        'is_active' => 'sometimes|boolean',
    ]);

    $data['is_active'] = $request->has('is_active');

    Product::create($data);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created');
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
        return redirect()->route('products.index')->with('success', 'Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Deleted');
    }
}

