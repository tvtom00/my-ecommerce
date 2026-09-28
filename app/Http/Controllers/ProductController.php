<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('status', true)
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    public function show(string $slug): View
    {
        $product = Product::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedProducts = Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();

        return view('products.show', compact(
            'product',
            'relatedProducts'
        ));
    }
}
