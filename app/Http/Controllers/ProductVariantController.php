<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Product $product)
    {
        $variants = $product->variants()->with('attributes')->get();
        return view('admin.variants.index', compact('product', 'variants'));
    }

    public function create(Product $product)
    {
        $attributes = Attribute::where('is_variant_attribute', true)
            ->with('values')
            ->get();

        return view('admin.variants.create', compact('product', 'attributes'));
    }

    public function store(Request $request, Product $product)
    {
        $variant = $product->variants()->create([
            'sku' => $request->sku,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
        ]);

        foreach ($request->attribute_values as $valueId) {
            $variant->attributes()->attach($valueId);
        }

        return redirect()->route('admin.products.variants.index', $product);
    }
}
