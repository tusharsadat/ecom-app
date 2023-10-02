<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.allsubcategory');
    }

    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }

    public function StoreSubcategory(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required|unique:subcategories',
            'product_category' => 'required',
        ]);
    }
}
