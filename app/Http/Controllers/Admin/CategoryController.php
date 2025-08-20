<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Utils\ImageUtils;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data=$request->validated();
        $data['slug'] = Str::slug($data['name'], '-');
           ($request->hasFile('image'))? $data['image'] = ImageUtils::upload($request->image) : null;
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        ($request->hasFile('image')) ? $data['image'] = ImageUtils::update($category->image, $request->image) : null;
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(request()->hasFile('image') ) {
            Storage::delete("public/blogs/$category->image");
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Product deleted successfully!');
    }
}
