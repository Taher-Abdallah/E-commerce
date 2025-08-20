<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showCategory()
    {
        // $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('admin.category.index',);
    }
}
