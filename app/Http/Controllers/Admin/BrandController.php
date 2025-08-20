<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Utils\ImageUtils;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $data['image'] = ImageUtils::upload($request->image);
        }
        Brand::create($data);
        return redirect()->route('brand.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }
    
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:brands,slug,'.$brand->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data['slug'] = Str::slug($data['name']);
         ($request->hasFile('image')) ? $data['image'] = ImageUtils::update($brand->image, $request->image): null;
        $brand->update($data);
        return redirect()->route('brand.index')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        // if(request()->hasFile('image') ) {
        //     Storage::delete("public/blogs/$brand->image");
        // }
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Product deleted successfully!');
    }
}