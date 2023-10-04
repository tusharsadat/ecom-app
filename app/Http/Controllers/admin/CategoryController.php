<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        return redirect()->route('allcategory')->with('message', 'Category added successfully');
    }

    public function EditCategory($id)
    {
        $categoryinfo = Category::findOrFail($id);
        return view('admin.editcategory', compact('categoryinfo'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;
        //dd($request->all());

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        return redirect()->route('allcategory')->with('message', 'Category update successfully');
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('allcategory')->with('message', 'Category delete successfully');
    }
}
