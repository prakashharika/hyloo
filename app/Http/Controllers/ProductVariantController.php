<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Attribute;
use App\Models\AttributeValue;

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
    
    $validated = $request->validate([
        'sku' => 'required|string|unique:product_variants,sku',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer',
        'attribute_values' => 'nullable|array', // nullable allows no checkbox selection
    ]);

    // ✅ Create the variant
    $variant = $product->variants()->create([
        'sku' => $validated['sku'],
        'price' => $validated['price'],
        'stock_quantity' => $validated['stock_quantity'],
    ]);

  $attributeValues = array_filter($validated['attribute_values'] ?? []);

if (!empty($attributeValues)) {
    $variant->attributes()->attach($attributeValues);
}

    
    return redirect()->route('products.variants.index', $product)
                     ->with('success', 'Variant created successfully!');
}

}
