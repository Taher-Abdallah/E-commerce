<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9);
        $brands = Brand::withCount('products')
            ->has('products')
            ->get();
        return view('front.shop', get_defined_vars());
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products=Product::get();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) // استبعاد المنتج الحالي
            ->inRandomOrder() // ترتيب عشوائي (اختياري)
            ->take(6) // عدد المنتجات
            ->get();
        return view('front.details', get_defined_vars());
    }
}
