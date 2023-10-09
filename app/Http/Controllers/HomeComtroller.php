<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeComtroller extends Controller
{
    public function index()
    {
        $product_info = Product::latest()->get();
        return view('client_template.home', compact('product_info'));
    }
}
