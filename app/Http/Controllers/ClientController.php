<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id)
    {
        $categories = Category::findOrFail($id);
        $product_info = Product::where('product_category_id', $id)->latest()->get();
        return view('client_template.category', compact('categories', 'product_info'));
    }

    public function SingleProduct($id)
    {
        $product_info = Product::findOrFail($id);
        $subcategory_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_product = Product::where('product_subcategory_id', $subcategory_id)->latest()->get();
        return view('client_template.singleproduct', compact('product_info', 'related_product'));
    }

    public function AddToCart()
    {
        return view('client_template.addtocart');
    }

    public function CheckOutPage()
    {
        return view('client_template.checkout');
    }

    public function UserProfile()
    {
        return view('client_template.userprofile');
    }

    public function PendingOrders()
    {
        return view('client_template.pending_orders');
    }

    public function History()
    {
        return view('client_template.history');
    }

    public function NewRelease()
    {
        return view('client_template.newrelease');
    }

    public function TodaysDeal()
    {
        return view('client_template.todaysdeal');
    }

    public function CustomerService()
    {
        return view('client_template.customerservice');
    }
}
