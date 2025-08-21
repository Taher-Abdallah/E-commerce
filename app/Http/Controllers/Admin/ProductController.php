<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Utils\ImageUtils;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::take(4)->get();
        $brands = Brand::take(4)->get();
        return view('admin.product.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data=$request->validated();
        $data['slug'] =Str::slug($data['name']);

        ($request->hasFile('image')) ? $data['image'] = ImageUtils::upload($request->file('image'), 'products'):null;
        if ($request->hasFile('images')) {
            $imagesPath = ImageUtils::uploadMultiple($request->file('images'), 'products');
            $data['images'] = implode(',', $imagesPath);
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::take(4)->get();
        $brands = Brand::take(4)->get();
        return view ('admin.product.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::take(4)->get();
        $brands = Brand::take(4)->get();
        return view('admin.product.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        ($request->hasFile('image')) ? $data['image'] = ImageUtils::update($product->image, $request->file('image'), 'products'):null;
        if ($request->hasFile('images')) {
            $imagesPath = ImageUtils::updateMultiple($product->images, $request->file('images'), 'products');
            $data['images'] = implode(',', $imagesPath);
        }
        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete("public/products/$product->image");
        }
        if ($product->images) {
            $images = explode(',', $product->images);
            foreach ($images as $image) {
                Storage::delete("public/products/$image");
            }
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
