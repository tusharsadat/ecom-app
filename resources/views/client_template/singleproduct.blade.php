@extends('client_template.layouts.template');
@section('contain')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset('upload/' . $product_info->product_img) }}"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <h4 class="shirt_text text-left">{{ $product_info->product_name }}</h4>
                    <h5 style="color: #262626;" class="price_text text-left">{{ $product_info->product_short_des }}</h5>
                    <p class="price_text text-left">Price <span style="color: #262626;">$
                            {{ $product_info->product_price }}</span></p>
                    <div class="my-3 product-details">
                        <p class="lead">{{ $product_info->product_long_des }}</p>
                        <ul class="p-2 bg-light my-2">
                            <li>Category: {{ $product_info->product_category_name }}</li>
                            <li>Sub Cagegory: {{ $product_info->product_subcategory_name }}</li>
                            <li>Available Quantity: {{ $product_info->product_count }}</li>
                        </ul>
                    </div>
                    <div class="btn btn-warning">
                        <div class="buy_bt"><a href="#">Add To Cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
