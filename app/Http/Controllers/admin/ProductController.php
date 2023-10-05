<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product_info = Product::latest()->get();
        return view('admin.allproduct', compact('product_info'));
    }

    public function AddProduct()
    {
        $category_info = Category::latest()->get();
        $subcategory_info = Subcategory::latest()->get();
        return view('admin.addproduct', compact('category_info', 'subcategory_info'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_price' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'product_count' => 'required',
        ]);

        $img = $request->product_img;
        $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_price' => $request->product_price,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_name,
            'product_count' => $request->product_count,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Product added successfully');
    }
}
