<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage()
    {
        return view('client_template.category');
    }

    public function SingleProduct()
    {
        return view('client_template.singleproduct');
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
